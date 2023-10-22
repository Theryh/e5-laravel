<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PorteEmbarquement extends Model
{
    use HasFactory;

    protected $table = 'porte_embarquements';

    protected $factory = PorteEmbarquementFactory::class;

    protected $fillable = ['nom', 'est_ouverte', 'capacite_maximale', 'hall_id'];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
