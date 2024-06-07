<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PorteEmbarquement;

class PorteEmbarquementFactory extends Factory
{
    protected $model = PorteEmbarquement::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'est_actif' => $this->faker->boolean,
            'ordre_de_priorite' => $this->faker->numberBetween(1, 100),
            'note' => $this->faker->sentence(), // Ajout du champ "note"
        ];
    }
}
