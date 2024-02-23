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
        Schema::create('cours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('annee_id');
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('enseignant_id');
            $table->unsignedBigInteger('ecue_id');
            $table->unsignedBigInteger('contrat_id');
            $table->integer('semestre')->nullable();
            $table->integer('heure_theorique')->nullable();
            $table->integer('heure_execute')->nullable();
            $table->string('plage')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->integer('etat')->nullable();
            $table->string('montant')->nullable();
            $table->string('lettre_mission')->nullable();
            $table->datetime('date_composition')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('annee_id')
                ->references('id')
                ->on('annees')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('classe_id')
                ->references('id')
                ->on('classes')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('enseignant_id')
                ->references('id')
                ->on('enseignants')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('ecue_id')
                ->references('id')
                ->on('ecues')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            
            $table->foreign('contrat_id')
                ->references('id')
                ->on('contrats')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseigner');
    }
};
