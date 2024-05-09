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
        Schema::create('informasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); 
            $table->text('deskripsi'); 
            $table->string('kategori')->nullable(); 
            $table->boolean('aktif')->default(true); 
            $table->dateTime('tanggal_publikasi')->nullable(); 
            $table->unsignedBigInteger('admin_id'); 
            $table->timestamps(); 

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus constraint foreign key terlebih dahulu
        Schema::table('informasi', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
        });

        Schema::dropIfExists('informasi');
    }
};
