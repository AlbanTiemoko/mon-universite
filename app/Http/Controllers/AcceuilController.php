<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commune;
use App\Models\Ville;
use App\Models\Etablissement;
use App\Models\Avis;
use App\Models\Filiere;
use App\Models\ModeEtude;


class AcceuilController extends Controller
{
    public function accueil()
    {
        // Récupération des données uniques
        $diplomesRequis = Filiere::distinct()->pluck('diplome_requis');
        $domaines = Filiere::distinct()->pluck('nom');
        $modes = ModeEtude::distinct()->pluck('nom');
        
        $types = ['Filiere Industrielle', 'Filiere Tertiaire', 'Formation Qualifiante'];
        $filieres_par_type = [];

        foreach ($types as $type) {
            $filieres_par_type[$type] = Filiere::whereHas('type_filiere', function ($q) use ($type) {
                    $q->where('nom', $type);
                })
                ->latest()
                ->get()
                ->unique('nom') // Supprime les doublons de nom
                ->filter(function ($f) {
                    return strlen($f->affichage) <= 25;
                })
                ->take(4); // Max 4 par type
        }

        return view("index", [
            'filieres_industrielles' => $filieres_par_type['Filiere Industrielle'] ?? [],
            'filieres_tertiaires' => $filieres_par_type['Filiere Tertiaire'] ?? [],
            'filieres_qualifiantes' => $filieres_par_type['Formation Qualifiante'] ?? [],
        ], compact('diplomesRequis', 'domaines', 'modes'));
    }

    public function filiere(Request $request)
    {
        $communes = Commune::all();
        $villes = Ville::all();

        // Filtrage des établissements par type Filiere Industrielle
        $etablissements = Etablissement::whereHas('filieres', function ($query) {
            $query->whereHas('type_filiere', function ($q) {
                $q->where('nom', 'Filiere Industrielle');
            });
        })
        ->whereHas('adresses', function ($query) use ($request) {
            if ($request->filled('ville')) {
                $query->where('ville_id', $request->ville);
            }
            if ($request->filled('commune')) {
                $query->where('commune_id', $request->commune);
            }
        });

        // Si une filière est sélectionnée, on filtre les établissements qui l'ont
        if ($request->filled('filiere')) {
            // Récupérer la filière cliquée
            $filiere = Filiere::find($request->filiere);
            if ($filiere) {
                $etablissements->whereHas('filieres', function ($q) use ($filiere) {
                    $q->where('nom', $filiere->nom); // 🔁 On cherche par nom
                });
            }
        }

        $etablissements = $etablissements->with(['filieres' => function ($query) {
            $query->whereHas('type_filiere', function ($q) {
                $q->where('nom', 'Filiere Industrielle');
            });
        }])->paginate(20);

        // Récupération des 30 dernières filières industrielles
        $filieres_industrielles = Filiere::whereHas('type_filiere', function ($q) {
            $q->where('nom', 'Filiere Industrielle');
        })
        ->latest()
        ->get()
        ->unique('nom')   // Supprime les doublons par nom
        ->take(30);       // Prend les 30 premiers distincts

        return view("filieres", compact('communes', 'villes', 'etablissements', 'filieres_industrielles'));
    }

    public function filiere_tertiaires(Request $request)
    {
        $communes = Commune::all();
        $villes = Ville::all();

        $etablissements = Etablissement::whereHas('filieres', function ($query) {
            $query->whereHas('type_filiere', function ($q) {
                $q->where('nom', 'Filiere Tertiaire');
            });
        })
        ->whereHas('adresses', function ($query) use ($request) {
            if ($request->filled('ville')) {
                $query->where('ville_id', $request->ville);
            }
            if ($request->filled('commune')) {
                $query->where('commune_id', $request->commune);
            }
        });

        // ✅ Si une filière est sélectionnée, filtrer les établissements par cette filière
        if ($request->filled('filiere')) {
            // Récupérer la filière cliquée
            $filiere = Filiere::find($request->filiere);
            if ($filiere) {
                $etablissements->whereHas('filieres', function ($q) use ($filiere) {
                    $q->where('nom', $filiere->nom); // 🔁 On cherche par nom
                });
            }
        }

        $etablissements = $etablissements->with(['filieres' => function ($query) {
            $query->whereHas('type_filiere', function ($q) {
                $q->where('nom', 'Filiere Tertiaire');
            });
        }])->paginate(20);

        $filieres_tertiaire = Filiere::whereHas('type_filiere', function ($q) {
            $q->where('nom', 'Filiere Tertiaire');
        })
        ->latest()
        ->get()
        ->unique('nom')   // Supprime les doublons par nom
        ->take(30);       // Prend les 30 premiers distincts

        return view("filiere_tertiaire", compact('communes', 'villes', 'etablissements', 'filieres_tertiaire'));
    }

    public function formation(Request $request)
    {
        $communes = Commune::all();
        $villes = Ville::all();

        $etablissements = Etablissement::whereHas('filieres', function ($query) {
            $query->whereHas('type_filiere', function ($q) {
                $q->where('nom', 'Formation Qualifiante');
            });
        })
        ->whereHas('adresses', function ($query) use ($request) {
            if ($request->filled('ville')) {
                $query->where('ville_id', $request->ville);
            }

            if ($request->filled('commune')) {
                $query->where('commune_id', $request->commune);
            }
        });

        // Ajout du filtre sur la filière si elle est sélectionnée
        if ($request->filled('filiere')) {
        // Récupérer la filière cliquée
        $filiere = Filiere::find($request->filiere);
        if ($filiere) {
            $etablissements->whereHas('filieres', function ($q) use ($filiere) {
                $q->where('nom', $filiere->nom); // 🔁 On cherche par nom
            });
        }
    }

        $etablissements = $etablissements->with(['filieres' => function ($query) {
            $query->whereHas('type_filiere', function ($q) {
                $q->where('nom', 'Formation Qualifiante');
            });
        }])->paginate(20);

        $formation = Filiere::whereHas('type_filiere', function ($q) {
            $q->where('nom', 'Formation Qualifiante');
        })
        ->latest()
        ->get()
        ->unique('nom')   // Supprime les doublons par nom
        ->take(30);       // Prend les 30 premiers distincts

        return view("formation_qualifiante", compact('communes', 'villes', 'etablissements', 'formation'));
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

    public function filiere_school(Request $request, $slug)
    {
        $etablissement = Etablissement::where('slug', $slug)->firstOrFail();

        $filieresQuery = Filiere::query()
            ->where('etablissement_id', $etablissement->id)
            ->with('mode_etudes');

        // Filtres
        if ($request->filled('diplome_requis')) {
            $filieresQuery->where('diplome_requis', $request->diplome_requis);
        }

        if ($request->filled('diplome_final')) {
            $filieresQuery->where('diplome_final', $request->diplome_final);
        }

        if ($request->filled('mode_etude')) {
            $filieresQuery->whereHas('mode_etudes', function($q) use ($request) {
                $q->where('nom', $request->mode_etude);
            });
        }

        // Pagination avec conservation des paramètres
        $filieres = $filieresQuery->paginate(10)
            ->appends($request->except('page'));

        // Options pour les filtres
        $diplomeFinaux = Filiere::where('etablissement_id', $etablissement->id)
            ->distinct()->orderBy('diplome_final')->pluck('diplome_final');

        $diplomeRequis = Filiere::where('etablissement_id', $etablissement->id)
            ->distinct()->orderBy('diplome_requis')->pluck('diplome_requis');

        $modeEtudes = ModeEtude::whereHas('filieres', function($q) use ($etablissement) {
            $q->where('etablissement_id', $etablissement->id);
        })->orderBy('nom')->pluck('nom');

        return view("filieres_school", compact(
            'etablissement', 'filieres', 'diplomeFinaux', 'diplomeRequis', 'modeEtudes'
        ));
    }

    public function description_school($slug)
    {
        $etablissement = Etablissement::where('slug', $slug)->firstOrFail();

        $avis = Avis::where('etat', 1)
                    ->where('etablissement_id', $etablissement->id)
                    ->get();

        return view("presentation_school", compact('etablissement', 'avis'));
    }

    public function inscription(Request $request)
    {
        $etablissements = Etablissement::where('etat', 1)->get();
        $mode_etudes = ModeEtude::all();

        // Données sans doublons
        $diplome_requis = Filiere::select('diplome_requis')->distinct()->pluck('diplome_requis');
        $diplome_final = Filiere::select('diplome_final')->distinct()->pluck('diplome_final');
        $filieres = Filiere::select('nom', 'id')->distinct('nom')->get();

        // Si une filière est sélectionnée, récupère ses diplômes
        $filiereSelectionnee = null;
        $diplomeRequisAuto = null;
        $diplomeFinalAuto = null;

        if ($request->filled('filiere_id')) {
            $filiereSelectionnee = Filiere::find($request->filiere_id);

            if ($filiereSelectionnee) {
                $diplomeRequisAuto = $filiereSelectionnee->diplome_requis;
                $diplomeFinalAuto = $filiereSelectionnee->diplome_final;
            }
        }

        $etablissementSelectionne = $request->filled('etablissement_id')
            ? Etablissement::find($request->etablissement_id)
            : null;

        return view("school_inscription", compact(
            'etablissements', 'filieres', 'mode_etudes',
            'diplome_requis', 'diplome_final',
            'filiereSelectionnee', 'etablissementSelectionne',
            'diplomeRequisAuto', 'diplomeFinalAuto'
        ));
    }

    public function search()
{
    // Solution 3: Utiliser une sous-requête pour éviter les doublons
    $filieres = Filiere::with('etablissement')
                ->whereIn('id', function($query) {
                    $query->selectRaw('MIN(id)')
                          ->from('filieres')
                          ->groupBy('nom');
                })
                ->get();
    
    return view("search", compact('filieres'));
}
}
