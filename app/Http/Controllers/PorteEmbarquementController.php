<?php

namespace App\Http\Controllers;

use App\Models\PorteEmbarquement;
use Illuminate\Http\Request;

class PorteEmbarquementController extends Controller
{
    public function index()
    {
        $portesEmbarquement = PorteEmbarquement::all();
        return view('porte-embarquement.index', compact('portesEmbarquement'));
    }

    public function create()
    {
        return view('porte-embarquement.create');
    }

    public function edit(PorteEmbarquement $porteEmbarquement)
    {
        return view('porte-embarquement.edit', compact('porteEmbarquement'));
    }
    public function update(Request $request, PorteEmbarquement $porteEmbarquement)
{
    $data = $request->all();

    // Convertir la valeur de 'est_actif' en '1' ou '0'
    $estActif = isset($data['est_actif']) ? 1 : 0;

    $porteEmbarquement->update([
        'nom' => $data['nom'],
        'est_actif' => $estActif,
        'ordre_de_priorite' => $data['ordre_de_priorite'] ?? null,
        'note' => $data['note'],
    ]);

    return redirect()->route('porte-embarquement.index');
}

public function store(Request $request)
{
    $data = $request->all();

    // Convertir la valeur de 'est_actif' en '1' ou '0'
    $estActif = isset($data['est_actif']) ? 1 : 0;

    PorteEmbarquement::create([
        'nom' => $data['nom'],
        'est_actif' => $estActif,
        'ordre_de_priorite' => $data['ordre_de_priorite'] ?? null,
        'note' => $data['note'],
    ]);

    return redirect()->route('porte-embarquement.index');
}



    public function destroy(PorteEmbarquement $porteEmbarquement)
    {
        $porteEmbarquement->delete();
        return redirect()->route('porte-embarquement.index');
    }

    public function action()
    {
        $portesEmbarquement = PorteEmbarquement::all();
        return view('porte-embarquement.index', compact('portesEmbarquement'));
    }
}


// <!--
// use App\Repositories\PorteEmbarquementRepository;
// use App\Models\PorteEmbarquement;
// use Illuminate\Http\Request;

// class PorteEmbarquementController extends Controller
// {
//     protected $porteEmbarquementRepository;

//     public function __construct(PorteEmbarquementRepository $porteEmbarquementRepository)
//     {
//         $this->porteEmbarquementRepository = $porteEmbarquementRepository;
//     }

//     public function index()
//     {
//         $portesEmbarquement = PorteEmbarquement::all();
//         return view('porte-embarquement.index', compact('portesEmbarquement'));
//     }

//     public function create()
//     {
//         return view('porte-embarquement.create');
//     }

//     public function edit(PorteEmbarquement $porteEmbarquement)
//     {
//         return view('porte-embarquement.edit', compact('porteEmbarquement'));
//     }

//     public function store(Request $request)
//     {
//         $data = $request->all();


//         $this->porteEmbarquementRepository->store($data);

//         return redirect()->route('porte-embarquement.index');
//     }

//     public function update(Request $request, PorteEmbarquement $porteEmbarquement)
//     {
//         $data = $request->all();


//         $this->porteEmbarquementRepository->update($porteEmbarquement, $data);

//         return redirect()->route('porte-embarquement.index');
//     }

//     public function destroy(PorteEmbarquement $porteEmbarquement)
//     {
//         $porteEmbarquement->delete();

//         return redirect()->route('porte-embarquement.index');
//     }

//     public function action()
//     {
//         $portesEmbarquement = PorteEmbarquement::all();
//         return view('porte-embarquement.index', compact('portesEmbarquement'));
//     }
// }
//  -->

