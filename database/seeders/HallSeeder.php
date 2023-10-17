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


        $bouncer->role()->create([
            'name' => 'opérateur',
        ]);


        $bouncer->role()->create([
            'name' => 'administrateur',
        ]);

        Hall::factory()->count(10)->create();
    }
}
