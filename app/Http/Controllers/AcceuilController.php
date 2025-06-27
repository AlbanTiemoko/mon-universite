<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commune;
use App\Models\Ville;


class AcceuilController extends Controller
{
    public function accueil()
    {
        return view("index");
    }

    public function filiere()
    {
        $communes = Commune::all();
        $villes = Villes::all();
        return view("filieres", compact('communes', 'villes'));
    }

    public function filiere_tertiaires()
    {
        $communes = Commune::all();
        $villes = Villes::all();
        return view("filiere_tertiaire", compact('communes', 'villes'));
    }

    public function formation()
    {
        $communes = Commune::all();
        $villes = Villes::all();
        return view("formation_qualifiante", compact('communes', 'villes'));
    }

    public function blog()
    {
        return view("all_article");
    }

    public function connexion_student()
    {
        return view("connexion_etudiant");
    }

    public function password_forget()
    {
        return view("password_forget");
    }

    public function password_reset()
    {
        return view("reset-password");
    }

    public function inscription_etudiant()
    {
        return view("inscription_etudiant");
    }

    public function connexion_etablissement()
    {
        return view("etablissement_connexion");
    }

    public function inscription_etablissement()
    {
        return view("inscription_etablissement");
    }

    public function filiere_school()
    {
        return view("filieres_school");
    }

    public function description_school()
    {
        return view("presentation_school");
    }

    public function inscription()
    {
        return view("school_inscription");
    }
}
