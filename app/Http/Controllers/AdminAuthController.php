<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Newsletter;
use App\Models\Etablissement;
use App\Models\Inscription;


class AdminAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('admin.auth-register');
    }

    public function showLoginForm()
    {
        return view('admin.auth-login');
    }

    public function register(Request $request)
    {
        // Validation des champs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Création de l'admin
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Connexion automatique
        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended(route('admin.dashboard'));
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

        $etudiants = User::latest()->paginate(15);
        $etablissements = Etablissement::latest()->paginate(15);
        $newsletters = Newsletter::latest()->paginate(15);
        $inscriptions = Inscription::latest()->paginate(15);
        
        return view('admin.index', compact('etudiants', 'etablissements', 'newsletters', 'inscriptions')); // Vue spécifique
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
