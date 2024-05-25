<?php

USE Illuminate\DATABASE\Migrations\Migration;
USE Illuminate\DATABASE\SCHEMA\Blueprint;
USE Illuminate\Support\Facades\SCHEMA;

RETURN NEW class extends Migration
{
    /**
     * Run the migrations.
     */
    public FUNCTION up(): void
    {
        SCHEMA::CREATE('tickets', FUNCTION (Blueprint $TABLE) {
            $TABLE->id();
            $TABLE->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $TABLE->DATE('tanggal_pemesanan');
            $TABLE->DATE('tanggal_keberangkatan');
            $TABLE->INTEGER('jumlah_penumpang');
            $TABLE->STRING('asal_keberangkatan');
            $TABLE->STRING('tujuan_keberangkatan');
            $TABLE->TIME('waktu_keberangkatan')->nullable(); 
            $TABLE->STRING('nomor_kursi')->nullable(); 
            $TABLE->STRING('nomor_kendaraan')->nullable(); 
            $TABLE->STRING('kelas')->nullable();
            $TABLE->INTEGER('jumlah_penumpang_terdaftar')->default(0); 
            $TABLE->DECIMAL('subtotal', 10, 2)->nullable(); 
            $TABLE->STRING('metode_pembayaran')->nullable(); 
            $TABLE->STRING('status_pembayaran')->nullable(); 
            $TABLE->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public FUNCTION down(): void
    {
        SCHEMA::dropIfExists('tickets');
    }
};
