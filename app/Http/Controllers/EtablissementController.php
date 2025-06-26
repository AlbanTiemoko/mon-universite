<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EtablissementVilleCommune;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Etablissement;
use Illuminate\Support\Facades\Auth;


class EtablissementController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            "reference" => ['required', 'min:3'],
            "nom" => ['required', 'string', 'max:255'],
            "email" => ['required', 'email', 'unique:etablissements,email'],
            "numero" => ['required', 'string', 'max:20'],
            "logo" => ['required', 'image', 'mimes:jpeg,png', 'max:2048'],
            "cover" => ['required', 'image', 'mimes:jpeg,png', 'max:2048'],
            "longitude" => ['required', 'numeric'],
            "latitude" => ['required', 'numeric'],
            "ville_id" => ['required', 'array'],
            "ville_id.*" => ['exists:villes,id'],
            "commune_id" => ['nullable', 'array'],
            "commune_id.*" => ['nullable', 'exists:communes,id'],
            "rue" => ['required', 'array'],
            "rue.*" => ['required', 'string', 'max:255'],

        ]);

        // Vérification existence établissement
        if (Etablissement::where('email', $request->email)->exists()) {
            return back()->with("error", "Cet établissement existe déjà");
        }

        // Traitement des fichiers
        $logoName = time().'_'.$request->file('logo')->getClientOriginalName();
        $coverName = time().'_'.$request->file('cover')->getClientOriginalName();
        
        $chemin = "assets/etablissement/";
        $request->file('logo')->move(public_path($chemin), $logoName);
        $request->file('cover')->move(public_path($chemin), $coverName);

        // Création de l'établissement
        $etablissement = Etablissement::create([
            'slug' => Str::slug($request->nom).'-'.uniqid(),
            'reference' => $request->reference,
            'nom' => $request->nom,
            'numero' => $request->numero,
            'deuxieme_numero' => $request->deuxieme_numero,
            'email' => $request->email,
            'logo' => $chemin.$logoName,
            'cover' => $chemin.$coverName,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'url_spot' => $request->url_spot,
            'description' => $request->description,
            'etat' => 1, // Valeur par défaut
            'user_created_id' => Auth::id(),
        ]);

        // Création de la relation après avoir l'ID de l'établissement
        foreach ($request->ville_id as $index => $villeId) {
            EtablissementVilleCommune::create([
                'etablissement_id' => $etablissement->id,
                'ville_id' => $villeId,
                'commune_id' => $request->commune_id[$index] ?? null,
                'rue' => $request->rue[$index] ?? '',
            ]);
        }

        return redirect()->route('liste.etablissement')->with("success", "Établissement enregistré avec succès");
    }
}
