<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ModeEtude;
use App\Models\Ville;
use App\Models\Commune;

class ConfigurationController extends Controller
{
    //**Functions pour Mode Etude */
    public function store(Request $request)
    {
        $mode_etudes = new ModeEtude();
        $mode_etudes->reference = $request->reference_mode_etude;
        $mode_etudes->nom = $request->nom_mode_etude;
        $mode_etudes->user_created_id = Auth::id();
        $mode_etudes->save();
        
        return redirect()->route('liste.mode.etude')->with("success","Mode etude ". $request->nom_mode_etude ." enrégistré avec succès.");
        
    }

    public function destroy($id)
    {
        ModeEtude::where("id","=",$id)->delete();
        return redirect()->route('liste.mode.etude')->with("success","Mode etude supprimée avec succès.");
    }
    
    public function edit($id)
    {   
        $mode_etudes = ModeEtude::findOrfail($id);
        return view('admin.configuration.etude.edit', compact('mode_etudes'));
    }

    public function update(Request $request, $id)
    { 
        $mode_etudes = ModeEtude::find($id);
        $mode_etudes->update([
            'reference' => $request->reference_mode_etude,
            'nom' => $request->nom_mode_etude,
            'user_updated_id' => auth()->id()
        ]);
        
        return redirect()->route('liste.mode.etude')->with("success","Mode etude ". $request->nom_mode_etude ." mis à jour avec succès.");
    }

    //**Functions Ville */
    public function store_ville(Request $request)
    {
        $villes = new Ville();
        $villes->reference = $request->reference_ville;
        $villes->nom = $request->nom_ville;
        $villes->user_created_id = Auth::id();
        $villes->save();
        
        return redirect()->route('liste.ville')->with("success","Ville ". $request->nom_ville ." enrégistré avec succès.");
        
    }

    public function destroy_ville($id)
    {
        Ville::where("id","=",$id)->delete();
        return redirect()->route('liste.ville')->with("success","Ville supprimée avec succès.");
    }

    public function edit_ville($id)
    {   
        $villes = Ville::findOrfail($id);
        return view('admin.configuration.ville.edit', compact('villes'));
    }

    public function update_ville(Request $request, $id)
    { 
        $villes = Ville::find($id);
        $villes->update([
            'reference' => $request->reference_ville,
            'nom' => $request->nom_ville,
            'user_updated_id' => auth()->id()
        ]);
        
        return redirect()->route('liste.ville')->with("success","Ville ". $request->nom_mode_etude ." mis à jour avec succès.");
    }

    //**Functions Commune */
    public function store_commune(Request $request)
    {
        $communes = new Commune();
        $communes->reference = $request->reference_commune;
        $communes->nom = $request->nom_commune;
        $communes->ville_id = $request->ville_id;
        $communes->user_created_id = Auth::id();
        $communes->save();
        
        return redirect()->route('liste.commune')->with("success","Commune ". $request->nom_commune ." enrégistré avec succès.");
        
    }

    public function destroy_commune($id)
    {
        Commune::where("id","=",$id)->delete();
        return redirect()->route('liste.commune')->with("success","Commune supprimée avec succès.");
    }

    public function edit_commune($id)
    {   
        $villes = Ville::all();
        $communes = Commune::findOrfail($id);
        return view('admin.configuration.commune.edit', compact('communes', 'villes'));
    }

    public function update_commune(Request $request, $id)
    { 
        $communes = Commune::find($id);
        $communes->update([
            'reference' => $request->reference_commune,
            'nom' => $request->nom_commune,
            'ville_id' => $request->ville_id,
            'user_updated_id' => auth()->id()
        ]);
        
        return redirect()->route('liste.commune')->with("success","Commune ". $request->nom_mode_etude ." mis à jour avec succès.");
    }
}
