<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        'reference',
        'titre',
        'slug',
        'image',
        'description',
        'date',
        'user_created_id',
        'user_updated_id'
    ];

    // Génère automatiquement le slug
    public static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $article->slug = Str::slug($article->titre);
            $article->reference = 'ACTU-'.uniqid();
        });
    }
}
