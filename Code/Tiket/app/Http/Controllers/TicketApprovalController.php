<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\TicketApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TicketApprovalController extends Controller
{
    public function index()
    {
        $ticketApprovals = TicketApproval::all();
        return view('admin.approval_tiket', compact('ticketApprovals'));
    }

    public function acceptTicket($id)
    {
        $ticketApproval = TicketApproval::find($id);
        $ticketApproval->status = 'accepted';
        $ticketApproval->save();

        $payment = $ticketApproval->payment;
        $payment->status = 'accepted';
        $payment->save();

        return redirect()->back()->with('success', 'Ticket accepted successfully.');
    }

    public function rejectTicket($id)
    {
        $ticketApproval = TicketApproval::find($id);
        $ticketApproval->status = 'rejected';
        $ticketApproval->save();

        $payment = $ticketApproval->payment;
        $payment->status = 'rejected';
        $payment->save();

        return redirect()->back()->with('success', 'Ticket rejected successfully.');
    }
}
