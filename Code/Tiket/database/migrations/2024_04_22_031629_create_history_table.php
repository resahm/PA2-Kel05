<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('payment_method', 255);
            $table->dateTime('payment_date')->nullable();
            $table->string('image', 255)->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->unsignedBigInteger('ticket_id')->nullable();
            $table->unsignedBigInteger('paket_id')->nullable();
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->foreign('paket_id')->references('id')->on('paket')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history');
    }
}
