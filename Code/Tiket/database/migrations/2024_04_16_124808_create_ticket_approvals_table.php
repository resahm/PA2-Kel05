<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketApprovalsTable extends Migration
{
    public function up()
    {
        Schema::create('ticket_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('kelas');
            $table->decimal('subtotal', 10, 2);
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->timestamps();

            $table->foreign('payment_id')->references('id')->on('payments');

        });
    }

    public function down()
    {
        Schema::dropIfExists('ticket_approvals');
    }
}
