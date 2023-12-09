<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\HallRequest; // Import de la classe HallRequest
use App\Mail\HallUpdatedMail;
use App\Mail\HallCreatedMail;
use Illuminate\Support\Facades\Mail;

class HallController extends Controller
{
    public function index()
    {
        $halls = Hall::all();
        return view('hall.index', compact('halls'));
    }

    public function create()
    {
        if (Gate::allows('hall-access')) {
            return view('hall.create');
        } else {
            abort(403, 'Accès refusé car votre compte n\'a pas le rôle Admin');
        }
    }

    public function store(HallRequest $request) // Utilisation de HallRequest pour la validation
    {
        $data = $request->validated(); // Récupère les données validées

        DB::table('halls')->insert([
            'nom' => $data['nom'],
            'personnel_minimum' => $data['personnel_minimum'],
        ]);

        return redirect()->route('hall.index');
    }

    public function edit(Hall $hall)
    {
        if (Gate::allows('hall-access')) {
            return view('hall.edit', compact('hall'));
        } else {
            abort(403, 'Accès refusé car votre compte n\'a pas le rôle Admin');
        }
    }

    public function update(HallRequest $request, Hall $hall) // Utilisation de HallRequest pour la validation
    {
        $data = $request->validated(); // Récupère les données validées

        DB::table('halls')
            ->where('id', $hall->id)
            ->update([
                'nom' => $data['nom'],
                'personnel_minimum' => $data['personnel_minimum'],
            ]);

        return redirect()->route('hall.index');
    }

    public function destroy(Hall $hall)
    {
        $hall->delete();

        if (Gate::allows('hall-access')) {
            return redirect()->route('hall.index');
        } else {
            abort(403, 'Accès refusé car votre compte n\'a pas le rôle Admin');
        }
    }
}
