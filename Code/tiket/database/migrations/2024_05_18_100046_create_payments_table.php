<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('ticket_id');
            $table->decimal('amount', 10, 2);
            $table->string('payment_method', 255);
            $table->dateTime('payment_date')->nullable();
            $table->string('payment_proof', 255)->nullable(); // bukti pembayaran
            $table->string('ktp_image', 255)->nullable(); // gambar KTP
            $table->timestamps();

            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');

            // Indexes
            $table->index('ticket_id', 'payments_ticket_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
