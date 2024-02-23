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
        Schema::create('universites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->string('nom')->nullable();
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->string('siteweb')->nullable();
            $table->string('email')->nullable();
            $table->string('recteur')->nullable();
            $table->string('comptable')->nullable();
            $table->string('ville')->nullable();
            $table->string('logo')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universtites');
    }
};
