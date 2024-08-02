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
        Schema::create('cocteles', function (Blueprint $table) {
            $table->id('idCoctel');
            $table->string('nombre', 255);
            $table->string('categoria', 100);
            $table->boolean('esAlcoholico');
            $table->string('vaso', 100);
            $table->text('instrucciones');
            $table->string('imagenURL', 255)->nullable();
            $table->string('ingrediente1', 100)->nullable();
            $table->string('ingrediente2', 100)->nullable();
            $table->string('ingrediente3', 100)->nullable();
            $table->string('ingrediente4', 100)->nullable();
            $table->string('ingrediente5', 100)->nullable();
            $table->string('medida1', 50)->nullable();
            $table->string('medida2', 50)->nullable();
            $table->string('medida3', 50)->nullable();
            $table->string('medida4', 50)->nullable();
            $table->string('medida5', 50)->nullable();
            $table->dateTime('fechaModificacion')->nullable();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('cocteles');
    }
};
