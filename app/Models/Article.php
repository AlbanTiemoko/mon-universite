<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'reference', 'titre', 'image', 'description', 'date', 'user_updated_id',
    ];
}
