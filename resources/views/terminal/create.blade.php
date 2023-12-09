@extends('layouts.app')

@section('content')
    <h2>{{ __('messages.CreateT') }}</h2>

    <form method="POST" action="{{ route('terminal.store') }}">
        @csrf

        <div class="form-group">
            <label for="nom">{{ __('messages.NomTerminal') }}</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="emplacement">{{__('messages.Emplacement') }}</label>
            <input type="text" name="emplacement" id="emplacement" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_mise_en_service">{{__('messages.Date') }}</label>
            <input type="date" name="date_mise_en_service" id="date_mise_en_service" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.Create') }}</button>
    </form>
</div>
@endsection
