<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Notifications\NouvelleInscriptionNotification;
use Illuminate\Support\Facades\Notification;

class InscriptionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date_naissance'           => 'required|date',
            'genre'                    => 'required|string',
            'ville'                    => 'required|string',
            'commune_quartier'         => 'nullable|string',
            'telephone'                => 'required|string',
            'niveau_etude'             => 'required|string',
            'annee_obtention_diplome'  => 'required|string',
            'diplome_souhait'          => 'required|string',
            'mode_etude_id'            => 'required|integer|exists:mode_etudes,id',
            'filiere_id'               => 'required|integer|exists:filieres,id',
            'etablissement_id'         => 'required|integer|exists:etablissements,id',
            'info_additionnel'         => 'nullable|string',
        ]);

        // Générer automatiquement la référence
        $last = Inscription::latest()->first();
        $nextId = $last ? $last->id + 1 : 1;
        $reference = 'UDI-' . $nextId;

        $inscription = new Inscription();
        $inscription->reference = $reference;
        $inscription->user_id = auth()->id(); // Utilisation de l'ID de l'utilisateur authentifié
        $inscription->date_naissance = $validatedData['date_naissance'];
        $inscription->genre = $validatedData['genre'];
        $inscription->ville = $validatedData['ville'];
        $inscription->commune_quartier = $validatedData['commune_quartier'];
        $inscription->telephone = $validatedData['telephone'];
        $inscription->niveau_etude = $validatedData['niveau_etude'];
        $inscription->annee_obtention_diplome = $validatedData['annee_obtention_diplome'];
        $inscription->diplome_souhait = $validatedData['diplome_souhait'];
        $inscription->mode_etude_id = $validatedData['mode_etude_id'];
        $inscription->filiere_id = $validatedData['filiere_id'];
        $inscription->etablissement_id = $validatedData['etablissement_id'];
        $inscription->info_additionnel = $validatedData['info_additionnel'];
        $inscription->etat = 1;

        $inscription->save();

        // Charger les relations nécessaires
        $inscription->load(['user', 'filiere', 'etablissement']);

        // Envoi des notifications
        try {
            // Notification à l'établissement
            $inscription->etablissement->notify(new NouvelleInscriptionNotification($inscription));
            
            // Notification à info@monuniversite.ci
            Notification::route('mail', 'infos@monuniversite.ci')
                        ->notify(new NouvelleInscriptionNotification($inscription));
            
        } catch (\Exception $e) {
            \Log::error('Erreur envoi notification: ' . $e->getMessage());
            // Vous pouvez choisir de continuer même si l'envoi échoue
        }

        return redirect()->route('filieres')->with("success", "Votre demande inscription {$reference} envoyée avec succès.");
    }
}
