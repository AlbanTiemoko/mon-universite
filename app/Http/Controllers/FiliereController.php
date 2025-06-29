<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TypeFiliere;
use App\Models\Filiere;
use App\Models\Etablissement;
use App\Models\ModeEtude;


class FiliereController extends Controller
{
    //**Type filiere */
    public function store(Request $request)
    {
        $type_filieres = new TypeFiliere();
        $type_filieres->reference = $request->reference_type_filiere;
        $type_filieres->nom = $request->nom_type_filiere;
        $type_filieres->user_created_id = Auth::id();
        $type_filieres->save();
        
        return redirect()->route('type.filiere.liste')->with("success","Type ". $request->nom_type_filiere ." enrégistré avec succès.");
    }

    public function destroy($id)
    {
        TypeFiliere::where("id","=",$id)->delete();
        return redirect()->route('type.filiere.liste')->with("success","Type filiere supprimé avec succès.");
    }

    public function edit($id)
    {   
        $type_filieres = TypeFiliere::findOrfail($id);
        return view('admin.type-filiere.edit', compact('type_filieres'));
    }

    public function update(Request $request, $id)
    { 
        $type_filieres = TypeFiliere::find($id);
        $type_filieres->update([
            'reference' => $request->reference_type_filiere,
            'nom' => $request->nom_type_filiere,
            'user_updated_id' => auth()->id()
        ]);
        
        return redirect()->route('type.filiere.liste')->with("success","Type filiere ". $request->nom_mode_etude ." mis à jour avec succès.");
    }

    //**Filieres */
    public function store_filiere(Request $request)
    {
        // Vérification des doublons
        $exists = Filiere::where('etablissement_id', $request->etablissement_id)
            ->where('nom', $request->nom)
            ->exists();

        if ($exists) {
            return back()->with('error', "L'établissement a déjà une filière nommée « $request->nom ».");
        }

        $filiere = new Filiere();
        $filiere->reference = $request->reference;
        $filiere->etablissement_id = $request->etablissement_id;
        $filiere->nom = $request->nom;
        $filiere->diplome_final = $request->diplome_final;
        $filiere->diplome_requis = $request->diplome_requis;
        $filiere->duree = $request->duree;
        $filiere->montant_annuel = $request->montant_annuel;
        $filiere->prise_en_charge = $request->prise_en_charge;
        $filiere->type_filiere_id = $request->type_filiere_id;
        $filiere->user_created_id = Auth::id();
        $filiere->save();

        // Attacher les modes d'étude
        $filiere->mode_etudes()->attach($request->mode_etude_id);

        return redirect()->route('liste.filiere')
            ->with("success", "Filière « $request->nom » enregistrée avec succès.");
    }

    public function destroy_filiere($id)
    {
        Filiere::where("id","=",$id)->delete();
        return redirect()->route('liste.filiere')->with("success","Filiere supprimée avec succès.");
    }

    public function edit_filiere($id)
    {   
        $etablissements = Etablissement::where('etat', 1)->get();
        $type_filieres = TypeFiliere::all();
        $mode_etudes = ModeEtude::all();
        
        $filiere = Filiere::findOrfail($id);
        return view('admin.filiere.edit', compact('filiere','type_filieres', 'etablissements', 'mode_etudes'));
    }

    public function update_filiere(Request $request, $id)
    {
        $request->validate([
            "nom" => "required|string",
            "reference" => "required|string",
            "montant_annuel" => "required|numeric|min:0",
            "etablissement_id" => "required|exists:etablissements,id",
            "type_filiere_id" => "required|exists:type_filieres,id",
            "mode_etude_id" => "required|array",
            "mode_etude_id.*" => "exists:mode_etudes,id",
        ]);

        $filiere = Filiere::findOrFail($id);

        $filiere->update([
            'reference' => $request->reference,
            'nom' => $request->nom,
            'montant_annuel' => $request->montant_annuel,
            'etablissement_id' => $request->etablissement_id,
            'diplome_final' => $request->diplome_final,
            'diplome_requis' => $request->diplome_requis,
            'duree' => $request->duree,
            'prise_en_charge' => $request->prise_en_charge,
            'type_filiere_id' => $request->type_filiere_id,
            'user_updated_id' => Auth::id(),
        ]);

        // Synchronise les modes d’étude (table pivot)
        $filiere->mode_etudes()->sync($request->mode_etude_id);

        return redirect()->route('liste.filiere')
            ->with('success', 'Filière modifiée avec succès.');
    }

}
