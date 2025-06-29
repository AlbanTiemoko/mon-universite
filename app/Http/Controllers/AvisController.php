<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;
use Illuminate\Support\Str;

class AvisController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'avis' => 'required|string|min:10',
            'note' => 'required|integer|between:1,5',
            'etablissement_id' => 'required|exists:etablissements,id',
        ]);

        $avis = new Avis();
        $avis->reference = 'AVIS-' . strtoupper(Str::random(8));
        $avis->nom = $request->nom;
        $avis->email = $request->email;
        $avis->avis = $request->avis;
        $avis->note = $request->note;
        $avis->etablissement_id = $request->etablissement_id;
        $avis->etat = 0; // à modérer avant publication
        $avis->save();

        return redirect()->route('description.school', ['slug' => $avis->etablissement->slug])
            ->with("success", "Merci pour votre avis !");
    }

    public function etat(Request $request, $id, $etat)
    {
    $avis = Avis::find($id);

    if (!$avis) {
        return back()->with('error', 'Avis non trouvé');
    }

    // Vérifiez si l'état souhaité est valide
    $etatsValides = [0, 1]; // Ajoutez d'autres états valides si nécessaire
    if (!in_array($etat, $etatsValides)) {
        return back()->with('error', 'État non valide');
    }

    // Mettez à jour l'état de l'avis
    $avis->etat = $etat;

    // Enregistrez les modifications
    $avis->save();

    // Redirigez vers la page précédente ou une autre page appropriée
    return back()->with('success', 'Avis mis à jour avec succès');
    }

    public function destroy($id)
    {
        Avis::where("id","=",$id)->delete();
        return redirect()->route('liste.avis')->with("success","Avis supprimée avec succès.");
    }

}
