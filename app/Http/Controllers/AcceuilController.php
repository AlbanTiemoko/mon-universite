<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcceuilController extends Controller
{
    public function accueil()
    {
        return view("index");
    }

    public function filiere()
    {
        return view("filieres");
    }

    public function filiere_tertiaires()
    {
        return view("filiere_tertiaire");
    }

    public function formation()
    {
        return view("formation_qualifiante");
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
