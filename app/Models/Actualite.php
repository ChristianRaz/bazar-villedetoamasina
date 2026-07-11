<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Actualite extends Model
{
    protected $fillable = [
        'titre', 'slug', 'categorie', 'contenu',
        'image', 'video', 'video_url', 'date_publication'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($actualite) {
            if (empty($actualite->slug)) {
                $actualite->slug = Str::slug($actualite->titre);
            }
        });
    }
}
