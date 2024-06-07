<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PorteEmbarquement extends Model
{
    use HasFactory;

    protected $table = 'note_de_montage';

    protected $fillable = ['nom', 'est_actif', 'ordre_de_priorite', 'hall_id', 'note']; // Utilisation des nouveaux noms de colonnes

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
