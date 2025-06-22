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
}
