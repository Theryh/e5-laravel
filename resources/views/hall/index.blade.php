@extends('layouts.app')
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
<p><i>{{ __('messages.Note') }} </i></p>
@section('content')
    @can('create', App\Models\Hall::class)
        <a href="{{ route('hall.create') }}" class="btn btn-primary">Ajouter un hall</a>
    @endcan

    @foreach($halls as $hall)
        <h2>{{ $hall->nom }}</h2>
        <p>{{ __('messages.Personnel minimum') }} {{ $hall->personnel_minimum }}</p>

        @can('update', $hall)
            <a href="{{ route('hall.edit', $hall) }}" class="btn btn-primary">Éditer</a>
        @endcan

        @can('delete', $hall)
            <form method="POST" action="{{ route('hall.destroy', $hall) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de supprimer ce hall?')">Supprimer</button>
            </form>
        @endcan
    @endforeach
@endsection
