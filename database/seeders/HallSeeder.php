<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Silber\Bouncer\Bouncer;
use App\Models\Hall;

class HallSeeder extends Seeder
{
    public function run()
    {
        $bouncer = Bouncer::create();

        // Crée le rôle "opérateur"
        $bouncer->role()->create([
            'name' => 'opérateur',
        ]);

        // Crée le rôle "administrateur"
        $bouncer->role()->create([
            'name' => 'administrateur',
        ]);

        Hall::factory()->count(10)->create();
    }
}
