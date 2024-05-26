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
        Schema::create('detail_kendaraan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nomor_kendaraan'); // Tidak perlu unique karena bisa ada banyak tiket untuk satu kendaraan
            $table->string('nomor_kursi')->nullable(); 
            $table->integer('total_kursi');
            $table->string('kelas');
            $table->string('status'); // Status kendaraan atau kursi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kendaraan');
    }
};
