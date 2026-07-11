<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Projet extends Model
{
    protected $fillable = [
    'titre', 'slug', 'description', 'image','images',
    'video','video_url', 'statut', 'progression',
    'date_debut', 'date_fin'
    ];

    protected $casts = [
        'images' => 'array',
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted()
    {
        static::saving(function ($projet) {
            if (!$projet->slug) {
                $projet->slug = Str::slug($projet->titre);
            }
        });
    }

}
