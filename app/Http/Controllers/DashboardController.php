<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModeEtude;
use App\Models\Ville;
use App\Models\Commune;
use App\Models\User;
use App\Models\Admin;
use App\Models\Newsletter;
use App\Models\TypeFiliere;
use App\Models\Etablissement;
use App\Models\Inscription;
use App\Models\Filiere;
use App\Models\Avis;

class DashboardController extends Controller
{
    public function accueil()
    {
        $etudiants = User::all();
        $etablissements = Etablissement::all();
        $newsletters = Newsletter::all();
        $inscriptions = Inscription::all();
        $inscription_envoye = Inscription::where('etat', 1)->get();
        $inscription_traite = Inscription::where('etat', 2)->get();
        return view("admin.index", compact('etudiants', 'etablissements', 'newsletters', 'inscriptions', 'inscription_envoye', 'inscription_traite'));
    }

    public function connexion()
    {
        return view("admin.auth-login");
    }

    public function accueil_etablissement()
    {
        $etablissement_visible = Etablissement::with([
            'villeCommune',
            'villeCommune.ville',
            'villeCommune.commune'
        ])->get()->where('etat', 1);

        $etablissement_non_visible = Etablissement::with([
            'villeCommune',
            'villeCommune.ville',
            'villeCommune.commune'
        ])->get()->where('etat', 0);

        return view("admin.etablissement.accueil", compact('etablissement_visible', 'etablissement_non_visible'));
    }

    public function nouveau_etablissement()
    {
        $villes = Ville::all();
        $communes = Commune::all();

        return view("admin.etablissement.nouveau", compact('villes', 'communes'));
    }

    public function liste_etablissement(Request $request)
    {
        $query = Etablissement::with([
            'villeCommune', 
            'villeCommune.ville', 
            'villeCommune.commune'
        ]);

        // Filtre par référence
        if ($request->filled('reference')) {
            $query->where('reference', 'LIKE', '%'.$request->reference.'%');
        }

        // Filtre par nom
        if ($request->filled('nom')) {
            $query->where('nom', 'LIKE', '%'.$request->nom.'%');
        }

        // Filtre par adresse (rue, ville ou commune)
        if ($request->filled('adresse')) {
            $query->whereHas('villeCommune', function($q) use ($request) {
                $q->where('rue', 'LIKE', '%'.$request->adresse.'%')
                ->orWhereHas('ville', function($q) use ($request) {
                    $q->where('nom', 'LIKE', '%'.$request->adresse.'%');
                })
                ->orWhereHas('commune', function($q) use ($request) {
                    $q->where('nom', 'LIKE', '%'.$request->adresse.'%');
                });
            });
        }

        // Filtre par numéro
        if ($request->filled('numero')) {
            $query->where('numero', 'LIKE', '%'.$request->numero.'%')
                ->orWhere('deuxieme_numero', 'LIKE', '%'.$request->numero.'%');
        }

        // Filtre par email
        if ($request->filled('email')) {
            $query->where('email', 'LIKE', '%'.$request->email.'%');
        }

        // Filtre par état
        if ($request->filled('etat')) {
            $query->where('etat', $request->etat);
        }

        $etablissements = $query->paginate(10)->appends($request->query());

        return view("admin.etablissement.liste", compact('etablissements'));
    }

    public function liste_filiere(Request $request)
    {
        $type_filiere = TypeFiliere::all();
        
        $query = Filiere::with(['etablissement', 'type_filiere']);

        if ($request->filled('reference')) {
            $query->where('reference', 'like', '%' . $request->reference . '%');
        }

        if ($request->filled('nom')) {
            $query->where('nom', 'like', '%' . $request->nom . '%');
        }

        if ($request->filled('montant')) {
            $query->where('montant_annuel', '<=', (float) $request->montant);
        }

        if ($request->filled('duree')) {
            $query->where('duree', '=', $request->duree);
        }

        if ($request->filled('type')) {
            $query->whereHas('type_filiere', function ($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->type . '%');
            });
        }

        if ($request->filled('etablissement')) {
            $query->whereHas('etablissement', function ($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->etablissement . '%');
            });
        }

        $filiere = $query->paginate(15);

        return view("admin.filiere.liste", compact('filiere', 'type_filiere'));
    }

    public function nouvelle_filiere()
    {
        $mode_etudes = ModeEtude::all();
        $type_filieres = TypeFiliere::all();
        $etablissements = Etablissement::where('etat', 1)->get();
        return view("admin.filiere.nouvelle", compact('mode_etudes', 'type_filieres', 'etablissements'));
    }

    public function type_filiere_liste(Request $request)
    {
        $perPage = $request->input('par_page', 100);
        
        $query = TypeFiliere::query();

        // Filtre par référence (query est utilisé dans la vue)
        if ($request->filled('reference')) {
            $query->where('reference', 'like', '%' . $request->input('reference') . '%');
        }

        if ($request->filled('nom')) {
            $query->where('nom', 'like', '%' . $request->input('nom') . '%');
        }

        $type_filieres = $query->orderBy('created_at', 'desc')->simplePaginate($perPage);
        
        return view("admin.type-filiere.liste", compact('type_filieres'));
    }

    public function type_filiere_nouveau()
    {
        return view("admin.type-filiere.nouveau");
    }

    public function accueil_inscription()
    {
        $inscriptions = Inscription::where('etat', 1)->get();
        $inscription_traite = Inscription::where('etat', 2)->get();
        return view("admin.inscription.accueil", compact('inscriptions', 'inscription_traite'));
    }

    public function liste_inscription(Request $request)
    {
        $query = Inscription::query()
            ->with(['user', 'etablissement']); // si tu veux accéder à ces relations

        if ($request->filled('reference')) {
            $query->where('reference', 'like', '%' . $request->reference . '%');
        }
        if ($request->filled('date_demande')) {
            $query->whereDate('created_at', $request->date_demande);
        }
        if ($request->filled('nom')) {
            $query->where('nom', 'like', '%' . $request->nom . '%');
        }
        if ($request->filled('prenom')) {
            $query->where('prenom', 'like', '%' . $request->prenom . '%');
        }
        if ($request->filled('telephone')) {
            $query->where('telephone', 'like', '%' . $request->telephone . '%');
        }
        if ($request->filled('niveau_etude')) {
            $query->where('niveau_etude', 'like', '%' . $request->niveau_etude . '%');
        }
        if ($request->filled('diplome_final')) {
            $query->where('diplome_souhait', 'like', '%' . $request->diplome_final . '%');
        }
        if ($request->filled('forme_etude')) {
            $query->where('mode_etude_id', $request->forme_etude);
        }
        if ($request->filled('etablissement')) {
            $query->whereHas('etablissement', function ($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->etablissement . '%');
            });
        }
        if ($request->filled('etat')) {
            $query->where('etat', $request->etat);
        }

        $inscriptions = $query->paginate(15); // pagination

        return view("admin.inscription.liste", compact('inscriptions'));
    }

    public function accueil_avis()
    {
        $avis_non_visible = Avis::where('etat', 0)->get();
        $avis_visible = Avis::where('etat', 1)->get();
        return view("admin.avis.accueil", compact('avis_non_visible', 'avis_visible'));
    }

    public function liste_avis(Request $request)
    {
        $query = Avis::with('etablissement');

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        if ($request->filled('nom')) {
            $query->where('nom', 'like', '%' . $request->nom . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('avis')) {
            $query->where('avis', 'like', '%' . $request->avis . '%');
        }

        if ($request->filled('etablissement')) {
            $query->whereHas('etablissement', function ($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->etablissement . '%');
            });
        }

        if ($request->filled('etat')) {
            $query->where('etat', $request->etat);
        }

        $avis = $query->paginate(20);

        return view("admin.avis.liste", compact('avis'));
    }

    public function accueil_newsletter(Request $request)
    {
        $perPage = $request->input('par_page', 100);
        
        $query = Newsletter::query();

        // Filtre par référence (query est utilisé dans la vue)
        if ($request->filled('date')) {
            $query->where('created_at', 'like', '%' . $request->input('date') . '%');
        }

        if ($request->filled('name')) {
            $query->where('nom_prenom', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        $newsletters = $query->orderBy('created_at', 'desc')->simplePaginate($perPage);

        return view("admin.newsletter.accueil", compact('newsletters'));
    }

    public function accueil_users()
    {
        $admins = Admin::latest()->paginate(15);
        $etudiants = User::latest()->paginate(15);
        return view("admin.users.accueil", compact('admins', 'etudiants'));
    }

    public function liste_admin(Request $request)
    {
        $perPage = $request->input('par_page', 100);
        
        $query = Admin::query();

        // Filtre par référence (query est utilisé dans la vue)
        if ($request->filled('date')) {
            $query->where('created_at', 'like', '%' . $request->input('date') . '%');
        }

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        $admins = $query->orderBy('created_at', 'desc')->simplePaginate($perPage);
        
        return view("admin.users.liste-admin", compact('admins'));
    }

    public function liste_etudiants(Request $request)
    {
        $perPage = $request->input('par_page', 100);
        
        $query = User::query();

        // Filtre par référence (query est utilisé dans la vue)
        if ($request->filled('date')) {
            $query->where('created_at', 'like', '%' . $request->input('date') . '%');
        }

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('firstname')) {
            $query->where('firstname', 'like', '%' . $request->input('firstname') . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        $etudiants = $query->orderBy('created_at', 'desc')->simplePaginate($perPage);

        return view("admin.users.liste-etudiant", compact('etudiants'));
    }

    public function nouveau_admin()
    {
        return view("admin.users.nouveau");
    }

    public function liste_ville(Request $request){
        
        $perPage = $request->input('par_page', 20);
        
        $query = Ville::query();

        // Filtre par référence (query est utilisé dans la vue)
        if ($request->filled('query')) {
            $query->where('reference', 'like', '%' . $request->input('query') . '%');
        }

        if ($request->filled('nom')) {
            $query->where('nom', 'like', '%' . $request->input('nom') . '%');
        }

        $villes = $query->orderBy('created_at', 'desc')->simplePaginate($perPage);
        
        return view("admin.configuration.ville.liste", compact('villes'));
    }

    public function nouvelle_ville()
    {
        return view("admin.configuration.ville.nouvelle");
    }

    public function nouvelle_commune()
    {
        $villes = Ville::all();
        return view("admin.configuration.commune.nouvelle", compact("villes"));
    }

    public function liste_commune(Request $request){
        
        $perPage = $request->input('par_page', 20);
        
        $query = Commune::query();

        // Filtre par référence (query est utilisé dans la vue)
        if ($request->filled('query')) {
            $query->where('reference', 'like', '%' . $request->input('query') . '%');
        }

        if ($request->filled('ville')) {
            $query->whereHas('ville', function($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->input('ville') . '%');
            });
        }

        if ($request->filled('nom')) {
            $query->where('nom', 'like', '%' . $request->input('nom') . '%');
        }

        $communes = $query->orderBy('created_at', 'desc')->simplePaginate($perPage);
        
        return view("admin.configuration.commune.liste", compact('communes'));
    }

    public function liste_mode_etude(Request $request){
        
        $perPage = $request->input('par_page', 20);
        
        $query = ModeEtude::query();

        // Filtre par référence (query est utilisé dans la vue)
        if ($request->filled('query')) {
            $query->where('reference', 'like', '%' . $request->input('query') . '%');
        }

        if ($request->filled('nom')) {
            $query->where('nom', 'like', '%' . $request->input('nom') . '%');
        }

        $mode_etudes = $query->orderBy('created_at', 'desc')->simplePaginate($perPage);
        
        return view("admin.configuration.etude.liste", compact('mode_etudes'));
    }

    public function nouveau_etude()
    {
        return view("admin.configuration.etude.nouveau");
    }
}
