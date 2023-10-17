@extends('layouts.app')

@section('content')
    <h2>{{ __('messages.ModifP') }}</h2>

    <form method="POST" action="{{ route('porte-embarquement.update', $porteEmbarquement) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">{{ __('messages.NomPorte') }}</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $porteEmbarquement->nom }}" required>
        </div>

        <div class="form-group">
            <label for="est_ouverte">{{ __('messages.Ouverte') }}</label>
            <input type="checkbox" name="est_ouverte" id="est_ouverte" class="form-check-input" {{ $porteEmbarquement->est_ouverte ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="capacite_maximale">{{ __('messages.Capacite') }}</label>
            <input type="number" name="capacite_maximale" id="capacite_maximale" class="form-control" value="{{ $porteEmbarquement->capacite_maximale }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.Maj') }}</button>
    </form>
@endsection
