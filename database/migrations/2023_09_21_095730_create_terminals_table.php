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
        if (!Schema::hasTable('lignebs')) {
            Schema::create('lignebs', function (Blueprint $table) {
                $table->id();
                $table->string('nom');
                $table->string('emplacement');
                $table->date('date_mise_en_service');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LigneBS');
    }
};
