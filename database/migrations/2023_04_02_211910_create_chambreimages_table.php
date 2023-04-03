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
        Schema::create('chambreimages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('chambre_id');
            $table->foreign('chambre_id')->references('id')->on('chambres')->onDelete('cascade');
            $table->string('picture');
            $table->tinyInteger('thumb')->default('0');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambreimages');
    }
};
