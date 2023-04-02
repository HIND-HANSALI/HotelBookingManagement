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
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nameR');
            $table->text('descriptionR');
            $table->integer('categorie_id');
            $table->string('statutR');
            $table->string('pictureR');
            $table->integer('numberBed');
            $table->float('priceR');

            // $table->unsignedBigInteger('facility_id');
            // $table->foreign('facility_id')->references('id')->on('facilities')->onDelete('cascade');





        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres');
    }
};
