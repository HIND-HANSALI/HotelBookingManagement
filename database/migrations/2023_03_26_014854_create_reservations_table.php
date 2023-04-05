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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('checkIn');
            $table->date('checkOut');
            $table->string('statutBooking');
            $table->string('typeBooking');
            $table->float('totalPrice');
            $table->integer('numberPerson');
            $table->unsignedBigInteger('chambre_id');
            $table->foreign('chambre_id')->references('id')->on('chambres')->onDelete('cascade');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
