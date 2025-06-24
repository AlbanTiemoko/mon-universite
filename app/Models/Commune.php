<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = [
        'reference', 'nom', 'ville_id', 'user_updated_id',
    ];
    
    public function ville()
    {
        return $this->belongsTo(Ville::class, "ville_id");
    }

}
