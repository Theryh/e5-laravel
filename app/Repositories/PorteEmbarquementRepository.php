<?php

namespace App\Repositories;

use App\Models\PorteEmbarquement;

class PorteEmbarquementRepository
{
    protected $porteEmbarquement;

    public function __construct(PorteEmbarquement $porteEmbarquement)
    {
        $this->porteEmbarquement = $porteEmbarquement;
    }

    private function save(PorteEmbarquement $porteEmbarquement, array $inputs)
    {

        if (isset($inputs['_token'])) {
            unset($inputs['_token']);
        }

        $porteEmbarquement->fill($inputs);
        $porteEmbarquement->save();

        return $porteEmbarquement;
    }

    public function store(array $inputs)
    {
        $porteEmbarquement = new $this->porteEmbarquement;

        return $this->save($porteEmbarquement, $inputs);
    }

    public function update(PorteEmbarquement $porteEmbarquement, array $inputs)
    {
        return $this->save($porteEmbarquement, $inputs);
    }
}
