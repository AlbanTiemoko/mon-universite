<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    public function etablissement(){
        return $this->belongsTo(etablissement::class,"etablissement_id");
    }
}
