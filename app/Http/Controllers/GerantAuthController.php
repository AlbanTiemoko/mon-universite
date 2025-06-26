<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GerantAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('etablissement_connexion');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('gerant')->attempt($credentials)) { // Changé de 'admin' à 'gerant'
            return redirect()->intended(route('gerant.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect',
        ]);
    }

    public function dashboard()
    {
        // Double protection
        if (!Auth::guard('admin')->check()) { // ou 'gerant' pour l'autre contrôleur
            abort(403);
        }
        
        return view('admin.index'); // Vue spécifique
    }
}
