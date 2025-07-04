<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;

class Etablissement extends Model
{
    use Notifiable;

    public function routeNotificationForMail()
    {
        return $this->email; // suppose que la colonne email existe
    }
    
    protected $fillable = [
        'reference', 'nom', 'numero', 'deuxieme_numero', 'email', 'logo', 'cover', 'longitude', 'latitude', 'url_spot',
        'description', 'etat', 'user_updated_id', 'slug',
    ];
    
    public function filieres(){
        return $this->hasMany(Filiere::class);
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

    public function getCommuneRueAttribute()
    {
        if ($this->adresses->isEmpty()) {
            return 'Non spécifiée';
        }

        return $this->adresses->map(function ($adresse) {
            return implode(', ', array_filter([
                optional($adresse->commune)->nom,
                $adresse->rue
            ]));
        })->implode(' | ');
    }

    public function getVilleAttribute()
    {
        if ($this->adresses->isEmpty()) {
            return 'Non spécifiée';
        }

        return $this->adresses
            ->map(fn ($adresse) => optional($adresse->ville)->nom)
            ->filter()
            ->unique()
            ->implode(' | ');
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

    public function getUrlSpotEmbedAttribute()
    {
        $url = $this->url_spot;

        // ✅ YouTube standard
        if (Str::contains($url, 'youtube.com/watch')) {
            parse_str(parse_url($url, PHP_URL_QUERY), $query);
            $videoId = $query['v'] ?? null;
            return $videoId ? "https://www.youtube.com/embed/{$videoId}" : $url;
        }

        // ✅ YouTube short
        if (Str::contains($url, 'youtu.be/')) {
            $videoId = Str::after($url, 'youtu.be/');
            return "https://www.youtube.com/embed/{$videoId}";
        }

        // ✅ Vimeo
        if (Str::contains($url, 'vimeo.com/')) {
            $videoId = Str::afterLast($url, '/');
            return "https://player.vimeo.com/video/{$videoId}";
        }

        // ✅ Dailymotion
        if (Str::contains($url, 'dailymotion.com/video/')) {
            $videoId = Str::after($url, 'video/');
            return "https://www.dailymotion.com/embed/video/{$videoId}";
        }

        return $url; // fallback brut
    }

}
