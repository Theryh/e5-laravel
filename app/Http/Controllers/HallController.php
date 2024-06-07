<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Silber\Bouncer\Bouncer;
use Silber\Bouncer\Database;
use Illuminate\Support\Facades\Gate;

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

    public function store(Request $request)
    {
        $data = $request->all();

        DB::table('lignelgv')->insert([
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

    public function update(Request $request, Hall $hall)
    {
        $data = $request->all();

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
