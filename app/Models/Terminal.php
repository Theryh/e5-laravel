<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;
//
    protected $fillable = ['nom', 'emplacement', 'date_mise_en_service', '_token'];

    protected $factory = TerminalFactory::class;

    public function halls()
    {
        return $this->hasMany(Hall::class);
    }

    public function calculateCapaciteTotale()
    {
        return PorteEmbarquement::where('est_ouverte', true)
            ->sum('capacite_maximale');
    }
}
