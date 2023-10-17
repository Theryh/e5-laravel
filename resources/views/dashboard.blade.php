<head>
    <!-- Autres balises head... -->
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
</head>
<h2>Bienvenue, pour acceder au site complet suivez ces étapes:</h2>

<p>Veuillez à choisir l'emplacement qui vous interesse. Vous retrouverez les zones importantes de l'aeroport et la possibilité de gérer
    leurs contenu suivant vos accréditation.
</p>

<div class="center">

  <p>Voici les 3 existants:</p>

</div>
<nav class="pb-5 d-flex justify-content-center">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('hall.index') }}" style="text-decoration:none">Liste des halls</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('porte-embarquement.index') }}" style="text-decoration:none">Liste des porte-embarquements</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('terminal.index') }}" style="text-decoration:none">Liste des terminaux</a>
        </li>
    </ul>
</nav>
<a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

@section('content')
    @auth
        <a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>


    @endauth

    @guest
        <p>Vous devez être connecté pour accéder à cette page.</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Connexion</a>
        <a href="{{ route('register') }}" class="btn btn-success">Inscription</a>
    @endguest
@endsection
