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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->unsignedBigInteger('ticket_id');
            $table->decimal('amount', 10, 2);
            $table->string('kelas')->nullable();
            $table->string('payment_method', 255);
            $table->dateTime('payment_date')->nullable();
            $table->string('payment_proof', 255)->nullable();
            $table->string('ktp_image', 255)->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
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
