<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function accueil()
    {
        return view("admin.index");
    }

    public function connexion()
    {
        return view("admin.auth-login");
    }

    public function accueil_etablissement()
    {
        return view("admin.etablissement.accueil");
    }

    public function nouveau_etablissement()
    {
        return view("admin.etablissement.nouveau");
    }

    public function liste_etablissement()
    {
        return view("admin.etablissement.liste");
    }

    public function liste_filiere()
    {
        return view("admin.filiere.liste");
    }

    public function nouvelle_filiere()
    {
        return view("admin.filiere.nouvelle");
    }

    public function type_filiere_liste()
    {
        return view("admin.type-filiere.liste");
    }

    public function type_filiere_nouveau()
    {
        return view("admin.type-filiere.nouveau");
    }

    public function accueil_inscription()
    {
        return view("admin.inscription.accueil");
    }

    public function liste_inscription()
    {
        return view("admin.inscription.liste");
    }

    public function accueil_avis()
    {
        return view("admin.avis.accueil");
    }

    public function liste_avis()
    {
        return view("admin.avis.liste");
    }

    public function accueil_newsletter()
    {
        return view("admin.newsletter.accueil");
    }

    public function accueil_users()
    {
        return view("admin.users.accueil");
    }

    public function liste_admin()
    {
        return view("admin.users.liste-admin");
    }

    public function liste_etudiants()
    {
        return view("admin.users.liste-etudiant");
    }

    public function nouveau_admin()
    {
        return view("admin.users.nouveau");
    }
}
