<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $fillable = [
        'reference', 'nom', 'user_updated_id',
    ];
    
    public function etablissements()
    {
        return $this->belongsToMany(Etablissement::class, 'etablissement_ville_communes')
                    ->withPivot('commune_id');
    }

}
