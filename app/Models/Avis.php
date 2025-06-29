<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $fillable = [
        'reference', 'nom', 'email', 'avis', 'note', 'etat'
    ];
    
    public function etablissement(){
        return $this->belongsTo(etablissement::class,"etablissement_id");
    }
}
