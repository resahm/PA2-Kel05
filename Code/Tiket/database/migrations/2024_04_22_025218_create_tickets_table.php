<?php

use Illuminate\DATABASE\Migrations\Migration;
use Illuminate\DATABASE\SCHEMA\Blueprint;
use Illuminate\Support\Facades\SCHEMA;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        SCHEMA::CREATE('tickets', function (Blueprint $TABLE) {
            $TABLE->id();
            $TABLE->foreignId('user_id')->constrained()->onDelete('cascade');
            $TABLE->DATE('tanggal_pemesanan');
            $TABLE->DATE('tanggal_keberangkatan');
            $TABLE->INTEGER('jumlah_penumpang');
            $TABLE->STRING('asal_keberangkatan');
            $TABLE->STRING('tujuan_keberangkatan');
            $TABLE->TIME('waktu_keberangkatan')->nullable();
            $TABLE->STRING('nomor_kursi')->nullable();
            $TABLE->STRING('kelas')->nullable();
            $TABLE->INTEGER('jumlah_penumpang_terdaftar')->default(0);
            $TABLE->DECIMAL('subtotal', 10, 2)->nullable();
            $TABLE->STRING('metode_pembayaran')->nullable();
            $TABLE->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        SCHEMA::dropIfExists('tickets');
    }
};
