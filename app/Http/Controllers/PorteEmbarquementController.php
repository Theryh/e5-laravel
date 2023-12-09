<?php

namespace App\Http\Controllers;

use App\Models\PorteEmbarquement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PorteEmbarquementRequest; // Import de la classe PorteEmbarquementRequest


class PorteEmbarquementController extends Controller
{
    public function index()
    {
        $this->middleware('auth'); // Ajoutez cette ligne pour appliquer le middleware auth

        $portesEmbarquement = PorteEmbarquement::all();
        return view('porte-embarquement.index', compact('portesEmbarquement'));
    }

    public function create()
    {
        $porteEmbarquement = PorteEmbarquement::all();
        if (Gate::allows('porte-access')) {
            return view('porte-embarquement.create');
        } else {
            abort(403, 'Accès refusé car votre compte n\'a pas le rôle Admin');
        }
    }

    public function edit(PorteEmbarquement $porteEmbarquement)
    {
        if (Gate::allows('porte-access')) {
            return view('porte-embarquement.edit', compact('porteEmbarquement'));
        } else {
            abort(403, 'Accès refusé car votre compte n\'a pas le rôle Admin');
        }
    }

    public function update(PorteEmbarquementRequest $request, PorteEmbarquement $porteEmbarquement)
    {
        $data = $request->validated(); // Récupère les données validées

        $porteEmbarquement->update([
            'nom' => $data['nom'],
            'est_ouverte' => $data['est_ouverte'] ?? 0,
            'capacite_maximale' => $data['capacite_maximale'],
        ]);

        return redirect()->route('porte-embarquement.index');
    }

    public function store(PorteEmbarquementRequest $request)
    {
        $data = $request->validated(); // Récupère les données validées

        DB::table('porte_embarquements')->insert([
            'nom' => $data['nom'],
            'est_ouverte' => $data['est_ouverte'] ?? 0,
            'capacite_maximale' => $data['capacite_maximale'],
        ]);

        return redirect()->route('porte-embarquement.index');
    }

    public function destroy(PorteEmbarquement $porteEmbarquement)
    {
        $porteEmbarquement->delete();

        if (Gate::allows('porte-access')) {
            return redirect()->route('porte-embarquement.index');
        } else {
            abort(403, 'Accès refusé car votre compte n\'a pas le rôle Admin');
        }
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

