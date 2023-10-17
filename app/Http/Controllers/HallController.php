<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Silber\Bouncer\Bouncer;
use Boucer;

class HallController extends Controller
{
    public function index()
    {
        $halls = Hall::all();
        return view('hall.index', compact('halls'));
    }

    public function create()
    {
        return view('hall.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        DB::table('halls')->insert([
            'nom' => $data['nom'],
            'personnel_minimum' => $data['personnel_minimum'],
        ]);

        return redirect()->route('hall.index');
    }

    public function edit(Hall $hall)
    {
        return view('hall.edit', compact('hall'));
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

        return redirect()->route('hall.index');
    }

    protected function authenticated(Request $request, $user)
{
    // Vérifiez si l'utilisateur a un certain critère (par exemple, son email)
    if ($user->email === 'stheryhanot44@gmail.com') {
        // Attribuez le rôle "administrateur" à l'utilisateur
        Bouncer::assign('administrateur')->to($user);
    }
}
}
