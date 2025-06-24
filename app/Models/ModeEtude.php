<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModeEtude extends Model
{
    public function filieres(){
        return $this->hasMany(filiere::class);
    }

    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }
}
