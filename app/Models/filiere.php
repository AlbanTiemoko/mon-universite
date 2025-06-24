<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class filiere extends Model
{
    public function etablissement(){
        return $this->belongsTo(etablissement::class,"etablissement_id");
    }

    public function type_filiere(){
        return $this->belongsTo(TypeFiliere::class,"type_filiere_id");
    }

    public function mode_etude(){
        return $this->belongsTo(ModeEtude::class,"mode_etude_id");
    }
}
