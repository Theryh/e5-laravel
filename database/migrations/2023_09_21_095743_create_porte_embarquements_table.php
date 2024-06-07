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
        if (!Schema::hasTable('note_de_montage')) {
            Schema::create('note_de_montage', function (Blueprint $table) {
                $table->id();
                $table->string('nom');
                $table->boolean('est_actif')->default(false); // Renommage de la colonne
                $table->integer('ordre_de_priorite')->nullable();
                $table->text('note')->nullable(); // Ajout du champ "note"
                $table->timestamps();
            });
        } else {
            Schema::table('note_de_montage', function (Blueprint $table) {
                $table->text('note')->nullable(); // Ajout du champ "note" s'il n'existe pas
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('note_de_montage', function (Blueprint $table) {
            $table->renameColumn('est_actif', 'est_ouverte'); // Revenir au nom précédent
        });

        // Le renommage de la table n'est pas nécessaire ici
    }
};
