<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = [
        'reference', 'etablissement_id', 'nom', 'diplome_final', 'diplome_requis', 'duree', 'montant_annuel', 'mode_etude_id', 'prise_en_charge', 'type_filiere_id',
        'user_updated_id',
    ];
    
    public function etablissement(){
        return $this->belongsTo(Etablissement::class,"etablissement_id");
    }

    public function type_filiere(){
        return $this->belongsTo(TypeFiliere::class,"type_filiere_id");
    }

    public function mode_etudes(){
        return $this->belongsToMany(ModeEtude::class, 'filiere_mode_etudes');
    }

    public function getMontantFormateAttribute()
    {
        return number_format($this->montant_annuel, 0, ',', ' ') . ' FCFA';
    }

    public function getAffichageAttribute()
    {
        return strlen($this->nom) <= 25 ? $this->nom : $this->reference;
    }

}
