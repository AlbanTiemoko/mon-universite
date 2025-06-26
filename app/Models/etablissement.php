<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    protected $fillable = [
        'reference', 'nom', 'numero', 'deuxieme_numero', 'email', 'logo', 'cover', 'longitude', 'latitude', 'url_spot',
        'description', 'etat', 'user_updated_id', 'slug',
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

    // Dans app/Models/Etablissement.php
    public function villeCommune()
    {
        return $this->hasOne(EtablissementVilleCommune::class);
    }

    public function getAdresseCompleteAttribute()
    {
        if ($this->adresses->isEmpty()) {
            return 'Non spécifiée';
        }

        return $this->adresses->map(function ($adresse) {
            return implode(', ', array_filter([
                optional($adresse->ville)->nom,
                optional($adresse->commune)->nom,
                $adresse->rue
            ]));
        })->implode(' | ');
    }

    public function adresses()
    {
        return $this->hasMany(EtablissementVilleCommune::class);
    }

    public function getContactsAttribute()
    {
        if ($this->deuxieme_numero) {
            return $this->numero . ' / ' . $this->deuxieme_numero;
        }

        return $this->numero;
    }

}
