<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeLanguage($locale)
    {
        session(['locale' => $locale]); // Définissez la langue dans la session
        return redirect()->back(); // Redirigez l'utilisateur vers la page précédente
    }

}
