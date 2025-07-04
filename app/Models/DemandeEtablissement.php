<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeEtablissement extends Model
{
    protected $fillable = [
        'reference',
        'nom',
        'numero',
        'adresse',
        'description'
    ];
}
