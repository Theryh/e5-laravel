<?php
namespace App\Http\Controllers;

use App\Repositories\TerminalRepository; // Importez la classe du repository
use App\Models\Terminal;
use Illuminate\Http\Request;
use App\Models\PorteEmbarquement;
use Illuminate\Support\Facades\DB;


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
        return view('terminal.create');
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
        return view('terminal.edit', compact('terminal'));
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

        return redirect()->route('terminal.index');
    }
}
