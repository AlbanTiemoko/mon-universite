<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    public function ville()
    {
        return $this->belongsTo(Ville::class, "ville_id");
    }

}
