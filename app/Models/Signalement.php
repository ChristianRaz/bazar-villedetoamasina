<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Signalement extends Model
{
    protected $fillable = ['titre', 'description', 'quartier', 'photo', 'statut'];
}
