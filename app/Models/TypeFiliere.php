<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeFiliere extends Model
{
    public function filieres(){
        return $this->hasMany(filiere::class);
    }
}
