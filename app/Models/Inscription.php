<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    public function etablissement(){
        return $this->belongsTo(etablissement::class,"etablissement_id");
    }

    public function mode_etude(){
        return $this->belongsTo(ModeEtude::class,"mode_etude_id");
    }

    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }
}
