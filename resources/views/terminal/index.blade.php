<nav class="pb-5">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('hall.index') }}">Liste des halls</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('porte-embarquement.index') }}">Liste des porte-embarquements</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('terminal.index') }}">Liste des terminaux</a>
        </li>
    </ul>
</nav>
<a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@extends('layouts.app')

@section('content')
    <a href="{{ route('terminal.create') }}" class="btn btn-primary">Ajouter un terminal</a>

    @foreach($terminals as $terminal)
        <h2>{{ $terminal->nom }}</h2>
        <p>Emplacement : {{ $terminal->emplacement }}</p>
        <p>Date de mise en service : {{ $terminal->date_mise_en_service }}</p>
        {{--  <p>Capacité totale pour les portes d'embarquement ouvertes : {{ $terminal->calculateCapaciteTotale() }}</p> --}}

        <a href="{{ route('terminal.edit', $terminal) }}" class="btn btn-primary">Éditer</a>

        <form method="POST" action="{{ route('terminal.destroy', $terminal) }}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de supprimer ce terminal?')">Supprimer</button>
        </form>
    @endforeach
@endsection
