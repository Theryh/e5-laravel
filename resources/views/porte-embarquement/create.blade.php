@extends('layouts.app')

@section('content')
    <h2>{{ __('messages.CreateP') }}</h2>

    <form method="POST" action="{{ route('porte-embarquement.store') }}">
        @csrf

        <div class="form-group">
            <label for="nom">{{ __('messages.NomPorte') }}</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="est_actif">{{ __('messages.Ouverte') }}</label>
            <input type="checkbox" name="est_actif" id="est_actif" class="form-check-input">
        </div>

        <div class="form-group">
            <label for="ordre_de_priorite">{{ __('messages.Capacite') }}</label>
            <input type="number" name="ordre_de_priorite" id="ordre_de_priorite" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="note">{{ __('Note: ') }}</label>
            <textarea name="note" id="note" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.Create') }}</button>
    </form>
@endsection
