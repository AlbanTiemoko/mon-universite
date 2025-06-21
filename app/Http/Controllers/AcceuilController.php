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
}
