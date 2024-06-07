<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{

    protected $table = 'lignelgv';
    protected $policies = [
        Hall::class => HallPolicy::class,
    ];

    use HasFactory;

    protected $factory = HallFactory::class;

    public function porteEmbarquements()
    {
        return $this->hasMany(PorteEmbarquement::class);
    }

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }
}
