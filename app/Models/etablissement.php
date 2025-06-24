<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class etablissement extends Model
{
    protected $fillable = [
        'reference', 'nom', 'numero', 'deuxieme_numero', 'email', 'logo', 'cover', 'longitude', 'latitude', 'url_spot',
        'description', 'etat', 'user_updated_id',
    ];
    
    public function filieres(){
        return $this->hasMany(filiere::class);
    }

    public function avis(){
        return $this->hasMany(Avis::class);
    }

    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }

    public function villes()
    {
        return $this->belongsToMany(Ville::class, 'etablissement_ville_communes')
                    ->withPivot('commune_id');
    }

}
