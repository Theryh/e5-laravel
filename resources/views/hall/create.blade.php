@extends('layouts.app')

@section('content')
    <h2>{{ __('messages.CreateH') }}</h2>

    <form method="POST" action="{{ route('hall.store') }}">
        @csrf

        <x-nom-hall-input
            label="{{ __('messages.NomHall') }}"
            name="nom"
            id="nom"
            required
        />

        <x-personnel-minimum-input
        label="{{ __('messages.Personnel minimum') }}"
        name="personnel_minimum"
        id="personnel_minimum"
        required
    />



        <x-submit-button :messages="$messages" />

    </form>
@endsection
