<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('appblade.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <title>@yield('title', 'Formation Laravel 10')</title>
</head>
<body>
    <header>
        <center>
        <img src="{{ asset('logo_chantiers.png') }}" alt="Logo de l'entreprise" width="300" height="auto">
        </div>
        </center>
        <!-- Encadré pour le changement de langue -->
        <div class="language-selector">
            <ul>
                <li>
                    <img src="{{ asset('drapeau_anglais.png') }}" alt="English Flag" width="30" height="auto">
                    <a href="{{ route('change-language', ['locale' => 'en']) }}">English</a>
                </li>
                <li>
                    <img src="{{ asset('drapeau_france.png') }}" alt="French Flag" width="30" height="auto">
                    <a href="{{ route('change-language', ['locale' => 'fr']) }}">Français</a>
                </li>
            </ul>
        </div>
    </header>

    <div class="container">
        <div class="container">
            <!-- Forme (fermeture manquante) -->
            <!-- </form> -->
            <!-- Utilisation incorrecte de la balise form -->
        </div>

        @yield('content')
    </div>
</body>
