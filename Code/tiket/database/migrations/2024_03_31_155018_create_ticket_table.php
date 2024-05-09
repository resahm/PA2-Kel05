<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->string('email_pemesan');
            $table->string('nomor_telepon');
            $table->date('tanggal_pemesanan');
            $table->date('tanggal_keberangkatan');
            $table->time('waktu_keberangkatan');
            $table->string('asal_keberangkatan');
            $table->string('tujuan');
            $table->string('kelas');
            $table->decimal('harga_tiket', 15, 2); 
            $table->string('status_pembayaran');
            $table->string('metode_pembayaran');
            $table->string('kode_booking')->unique(); 
            $table->integer('jumlah_penumpang');
            $table->string('nomor_kursi')->nullable(); 
            $table->text('catatan_tambahan')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
