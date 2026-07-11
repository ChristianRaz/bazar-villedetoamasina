<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageAccueil extends Model
{
    protected $table = 'pages_accueil'; // ← AJOUTE CETTE LIGNE

    protected $fillable = [
        'mot_du_maire',
        'image_maire',
    ];
}
