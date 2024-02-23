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
        Schema::create('enseignants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('npi');
            $table->string('nom');
            $table->string('prenoms');
            $table->string('adresse');
            $table->string('telephone');
            $table->unsignedBigInteger('banque_id');
            $table->string('compte');
            $table->string('ifu');
            $table->string('nationalite');
            $table->string('sexe');
            $table->string('email');
            $table->string('profession');
            $table->date('date_naissance');
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('banque_id')
                ->references('id')
                ->on('banques')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignants');
    }
};
