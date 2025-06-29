<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModeEtude extends Model
{
    protected $fillable = [
        'reference', 'nom', 'user_updated_id',
    ];
    
    public function filieres()
    {
        return $this->belongsToMany(Filiere::class, 'filiere_mode_etudes');
    }

    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }
}
