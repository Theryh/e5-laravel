@extends('layouts.app')

@section('content')
    <h2>{{ __('messages.ModifH') }}</h2>

    <form method="POST" action="{{ route('hall.update', $hall) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">{{ __('messages.NomHall') }}</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $hall->nom }}" required>
        </div>

        <div class="form-group">
            <label for="personnel_minimum">{{ __('messages.Personnel minimum') }}</label>
            <input type="number" name="personnel_minimum" id="personnel_minimum" class="form-control" value="{{ $hall->personnel_minimum }}" required>
        </div>


        <button type="submit" class="btn btn-primary">{{ __('messages.Maj') }}</button>
    </form>
</div>
@endsection
