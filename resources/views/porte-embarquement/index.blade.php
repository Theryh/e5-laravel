@extends('layouts.app')

<nav class="pb-5">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('hall.index') }}">{{ __('messages.Hall') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('porte-embarquement.index') }}">{{ __('messages.Porte') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('terminal.index') }}">{{ __('messages.Terminal') }}</a>
        </li>
    </ul>
</nav>

<a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('messages.Deconnexion') }}</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<center><p>
    <p><i>{{ __('messages.InfoMontage') }} </i></p>
    </p>
</center>
@section('content')

    <a href="{{ route('porte-embarquement.create') }}" class="btn btn-primary">{{ __('messages.AjoutPorte') }}</a>

    @foreach($portesEmbarquement as $porteEmbarquement)
        <h2>{{ $porteEmbarquement->nom }}</h2>
        <p>{{ __('messages.Ouverte') }} {{ $porteEmbarquement->est_actif ? 'Oui' : 'Non' }}</p>
        <p>{{ __('messages.Capacite') }} {{ $porteEmbarquement->ordre_de_priorite }}</p>
        <p style="word-wrap: break-word;">{{ __('Note: ') }} {{ $porteEmbarquement->note }}</p> <!-- Ajout de la ligne pour afficher la note -->

        <a href="{{ route('porte-embarquement.edit', $porteEmbarquement) }}" class="btn btn-primary">{{__('messages.Edit') }}</a>

        <form method="POST" action="{{ route('porte-embarquement.destroy', $porteEmbarquement) }}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de supprimer cette équipe ?')">{{__('messages.Supp') }}</button>
        </form>
    @endforeach
@endsection
