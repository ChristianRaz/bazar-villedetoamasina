<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    //
     protected $fillable = [
        'nom',
        'slug',
        'description',
        'image',
        'contact',
        'email',
        'telephone',
    ];

    public function enfants() {
        return $this->hasMany(Direction::class, 'parent_id')->orderBy('ordre');
    }

    public function parent() {
    return $this->belongsTo(Direction::class, 'parent_id');
    }


}
