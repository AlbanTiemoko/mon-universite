<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TypeFiliere;


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
}
