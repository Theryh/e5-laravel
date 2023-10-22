<?php

namespace App\Repositories;

use App\Models\Terminal;

class TerminalRepository
{
    protected $terminal;

    public function __construct(Terminal $terminal)
    {
        $this->terminal = $terminal;
    }

    private function save(Terminal $terminal, array $inputs)
    {

        if (isset($inputs['_token'])) {
            unset($inputs['_token']);
        }


        $terminal->fill($inputs);
        $terminal->save();

        return $terminal;
    }

    public function store(array $inputs)
    {
        $terminal = new $this->terminal;

        return $this->save($terminal, $inputs);
    }
//
    public function update(Terminal $terminal, array $inputs)
    {
        return $this->save($terminal, $inputs);
    }
}
