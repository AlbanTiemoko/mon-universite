<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeFiliere extends Model
{
    protected $fillable = [
        'reference', 'nom', 'user_updated_id',
    ];
    
    public function filieres(){
        return $this->hasMany(filiere::class);
    }
}
