<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model {
    protected $fillable = [
        'direction_id',
        'periode',
        'date_rapport',
        'montant',
        'fichier_pdf',
        'commentaire',
        'slug'
    ];

    protected $casts = [
        'date_rapport' => 'date',
        'montant' => 'decimal:2'
    ];

    public function direction() {
        return $this->belongsTo(Direction::class);
    }
}
