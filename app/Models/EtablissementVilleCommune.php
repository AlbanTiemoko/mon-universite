<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtablissementVilleCommune extends Model
{
    protected $table = 'etablissement_ville_communes';

    protected $fillable = [
        'etablissement_id',
        'ville_id',
        'commune_id',
        'rue',
    ];
    
    public function etablissement() { 
        return $this->belongsTo(Etablissement::class); 
    }

    public function ville() { 
        return $this->belongsTo(Ville::class); 
    }

    public function commune() { 
        return $this->belongsTo(Commune::class); 
    }
}
