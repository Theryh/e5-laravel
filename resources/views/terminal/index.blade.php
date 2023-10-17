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
@extends('layouts.app')

@section('content')
    <a href="{{ route('terminal.create') }}" class="btn btn-primary">{{__('messages.AjoutTerminal') }}</a>

    @foreach($terminals as $terminal)
        <h2>{{ $terminal->nom }}</h2>
        <p>{{__('messages.Emplacement') }} {{ $terminal->emplacement }}</p>
        <p>{{__('messages.Date') }}{{ $terminal->date_mise_en_service }}</p>
        {{--  <p>Capacité totale pour les portes d'embarquement ouvertes : {{ $terminal->calculateCapaciteTotale() }}</p> --}}

        <a href="{{ route('terminal.edit', $terminal) }}" class="btn btn-primary">{{__('messages.Edit') }}</a>

        <form method="POST" action="{{ route('terminal.destroy', $terminal) }}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de supprimer ce terminal?')">{{__('messages.Supp') }}</button>
        </form>
    @endforeach
@endsection
