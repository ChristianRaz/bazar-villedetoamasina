<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Urgence extends Model
{
    protected $fillable = [
        'titre',
        'sous_titre',
        'date_fin',
        'source',
        'is_active',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
        'date_fin' => 'datetime',
        'is_active' => 'boolean',
    ];

    // Scope NE doit PAS avoir ->first()
    public function scopeActive($query) {
        return $query->where('is_active', true)
                     ->where('date_fin', '>=', now()) // pour ne prendre que les urgences valides
                     ->latest('date_fin');
    }
}
