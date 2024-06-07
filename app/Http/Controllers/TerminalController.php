<?php
namespace App\Http\Controllers;

use App\Repositories\TerminalRepository; // Importez la classe du repository
use App\Models\Terminal;
use Illuminate\Http\Request;
use App\Models\PorteEmbarquement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
class TerminalController extends Controller
{
    protected $terminalRepository; // Ajoutez une propriété pour le repository

    public function __construct(TerminalRepository $terminalRepository)
    {
        $this->terminalRepository = $terminalRepository;
    }

    public function liste()
    {
        $terminals = Terminal::all();

        return view('terminal.index', compact('terminals'));
    }

    public function index()
    {
        $terminals = Terminal::all();
        return view('terminal.index', compact('terminals'));
    }

    public function create()
    {
        if (Gate::allows('terminaux-access')) {
            return view('terminal.create');
        } else {
            abort(403, 'Accès refusé car votre compte n a pas le rôle Admin');
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // Utilisez le repository pour enregistrer les données
        $this->terminalRepository->store($data);

        return redirect()->route('terminal.index');
    }

    public function edit(Terminal $terminal)
    {
        if (Gate::allows('terminaux-access')) {
            return view('terminal.edit', compact('terminal'));
        } else {
            abort(403, 'Accès refusé car votre compte n a pas le rôle Admin');
        }
    }

    public function update(Request $request, Terminal $terminal)
    {
        $data = $request->all();

        // Utilisez le repository pour mettre à jour les données
        $this->terminalRepository->update($terminal, $data);

        return redirect()->route('terminal.index');
    }

    public function destroy(Terminal $terminal)
    {
        $terminal->delete();

        if (Gate::allows('terminaux-access')) {
            return redirect()->route('terminal.index');
        } else {
            abort(403, 'Accès refusé car votre compte na pas le rôle Admin');
        }
    }
}
