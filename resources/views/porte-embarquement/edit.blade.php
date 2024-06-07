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
            <label for="est_actif">{{ __('messages.Ouverte') }}</label>
            <input type="checkbox" name="est_actif" id="est_actif" class="form-check-input" {{ $porteEmbarquement->est_ouverte ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="ordre_de_priorite">{{ __('messages.Capacite') }}</label>
            <input type="number" name="ordre_de_priorite" id="ordre_de_priorite" class="form-control" value="{{ $porteEmbarquement->capacite_maximale }}" required>
        </div>

        <div class="form-group">
            <label for="note">{{ __('Note: ') }}</label>
            <textarea name="note" id="note" class="form-control" rows="4">{{ $porteEmbarquement->note ?? '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.Maj') }}</button>
    </form>
@endsection
