<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        return view('admin.header', compact('notifications'));
    }

    public function notifyUsers()
    {
        $tickets = Ticket::with('user')->where('status', 'completed')->get();

        foreach ($tickets as $ticket) {
            $user = $ticket->user;
            $message = "Pelanggan $user->name telah memesan tiket pada tanggal $ticket->tanggal_pemesanan.";

            Notification::create([
                'user_id' => $user->id,
                'message' => $message,
            ]);
        }

        return redirect()->back()->with('success', 'Notifications sent successfully');
    }
}
