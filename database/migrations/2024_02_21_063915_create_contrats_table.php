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
        Schema::create('contrats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero')->nullable();
            $table->string('fichier')->nullable();
            $table->unsignedBigInteger('enseignant_id');
            $table->unsignedBigInteger('ufr_id');
            $table->unsignedBigInteger('annee_id');
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('enseignant_id')
                ->references('id')
                ->on('enseignants')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('ufr_id')
                ->references('id')
                ->on('ufrs')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('annee_id')
                ->references('id')
                ->on('annees')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};
