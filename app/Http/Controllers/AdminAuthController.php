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

        return redirect()->route('admin.dashboard')->with("success", "Bienvenu dans votre tableau de bord !");
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


        // Données communes
        $monthNames = [
            1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril',
            5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août',
            9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'
        ];

        // 1. Étudiants
        $studentData = $this->prepareChartData(User::class, $monthNames);

        // 2. Établissements
        $establishmentData = $this->prepareChartData(Etablissement::class, $monthNames);

        // 3. Newsletters
        $newsletterData = $this->prepareChartData(Newsletter::class, $monthNames);

        // 4. Inscriptions
        $registrationData = $this->prepareChartData(Inscription::class, $monthNames);
        $sentRegistrations = $this->prepareChartData(Inscription::where('etat', 1), $monthNames);
        $processedRegistrations = $this->prepareChartData(Inscription::where('etat', 2), $monthNames);
        
        return view('admin.index', compact('etudiants', 'etablissements', 'newsletters', 'inscriptions',
                    'studentData',
                    'establishmentData',
                    'newsletterData',
                    'registrationData',
                    'sentRegistrations',
                    'processedRegistrations')); // Vue spécifique
    }

    private function prepareChartData($model, $monthNames)
    {
        $counts = is_object($model) 
            ? $model->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->whereYear('created_at', date('Y'))
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->pluck('count', 'month')
            : $model::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->whereYear('created_at', date('Y'))
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->pluck('count', 'month');

        $data = [];
        foreach ($monthNames as $num => $name) {
            $data[$name] = $counts[$num] ?? 0;
        }

        return $data;
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login')->with("success", "Aurevoir !");
    }
}
