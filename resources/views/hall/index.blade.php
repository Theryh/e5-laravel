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
<center>
<p>
<p><i>{{ __('messages.InfoLGV') }} </i></p>
</p>
</center>
@section('content')

        <a href="{{ route('hall.create') }}" class="btn btn-primary">{{__('messages.AjoutTerminal') }}</a>


    @foreach($halls as $hall)
        <h2>{{ $hall->nom }}</h2>
        <p>{{ __('messages.Personnel minimum') }} {{ $hall->personnel_minimum }}</p>


            <a href="{{ route('hall.edit', $hall) }}" class="btn btn-primary">{{__('messages.Edit') }}</a>



            <form method="POST" action="{{ route('hall.destroy', $hall) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de supprimer cette équipe ?')">{{__('messages.Supp') }}</button>
            </form>

    @endforeach
@endsection
