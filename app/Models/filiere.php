<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class filiere extends Model
{
    protected $fillable = [
        'reference', 'etablissement_id', 'nom', 'diplome_final', 'diplome_requis', 'duree', 'montant_annuel', 'mode_etude_id', 'prise_en_charge', 'type_filiere_id',
        'user_updated_id',
    ];
    
    public function etablissement(){
        return $this->belongsTo(etablissement::class,"etablissement_id");
    }

    public function type_filiere(){
        return $this->belongsTo(TypeFiliere::class,"type_filiere_id");
    }

    public function mode_etude(){
        return $this->belongsTo(ModeEtude::class,"mode_etude_id");
    }
}
