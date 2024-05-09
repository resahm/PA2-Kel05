<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id'); // Mengacu pada ID tiket
            $table->decimal('amount', 10, 2); // Jumlah pembayaran
            $table->string('payment_method'); // Metode pembayaran (e.g., kartu kredit, PayPal)
            $table->string('status'); // Status pembayaran (e.g., pending, completed, failed)
            $table->dateTime('payment_date')->nullable(); // Waktu pembayaran dilakukan
            $table->text('notes')->nullable(); // Catatan tentang pembayaran
            $table->timestamps();

            // Membuat foreign key constraint
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
