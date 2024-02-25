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
        Schema::create('programmations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('contrat_id')->nullable();
            $table->unsignedBigInteger('annee_id');
            $table->integer('semestre')->nullable();
            $table->unsignedBigInteger('ue_id');
            $table->integer('credit')->nullable();
            $table->string('montant')->nullable();

            $table->unsignedBigInteger('ecue1');
            $table->unsignedBigInteger('enseignant1');
            $table->integer('heure_theorique1')->nullable();
            $table->integer('heure_execute1')->nullable();
            $table->integer('etat1')->nullable();
            $table->time('plage_debut1')->nullable();
            $table->time('plage_fin1')->nullable();
            $table->date('date_debut1')->nullable();
            $table->date('date_fin1')->nullable();
            $table->datetime('date_composition1')->nullable();

            $table->unsignedBigInteger('ecue2')->nullable();
            $table->unsignedBigInteger('enseignant2')->nullable();
            $table->integer('heure_theorique2')->nullable();
            $table->integer('heure_execute2')->nullable();
            $table->integer('etat2')->nullable();
            $table->time('plage_debut2')->nullable();
            $table->time('plage_fin2')->nullable();
            $table->date('date_debut2')->nullable();
            $table->date('date_fin2')->nullable();
            $table->datetime('date_composition2')->nullable();
            
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

            $table->foreign('ue_id')
                ->references('id')
                ->on('ues')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            
            $table->foreign('contrat_id')
                ->references('id')
                ->on('contrats')
                ->onUpdate('restrict')
                ->onDelete('restrict');

                $table->foreign('ecue1')
                ->references('id')
                ->on('ecues')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('enseignant1')
                ->references('id')
                ->on('enseignants')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            
            $table->foreign('ecue2')
                ->references('id')
                ->on('ecues')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            
            $table->foreign('enseignant2')
                ->references('id')
                ->on('enseignants')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programmations');
    }
};
