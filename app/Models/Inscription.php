<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        'reference', 'user_id', 'genre', 'ville', 'commune_quartier', 'telephone', 'niveau_etude',
        'annee_obtention_diplome', 'diplome_souhait', 'mode_etude_id', 'domaine_etude', 'etablissement_id',
        'info_additionnel', 'etat'
    ];
    
    public function etablissement(){
        return $this->belongsTo(Etablissement::class,"etablissement_id");
    }

    public function filiere(){
        return $this->belongsTo(Filiere::class,"filiere_id");
    }

    public function mode_etude(){
        return $this->belongsTo(ModeEtude::class,"mode_etude_id");
    }

    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }
}
