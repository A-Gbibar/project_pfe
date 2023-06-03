<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfant extends Model
{
    use HasFactory;
    protected $fillable = [
        'idParent', 'nom', 'Prenom', 'Sexe', 'DateNaissance', 'tel', 'Diagnostique', 'Medecin', 'photo'
    ];
}
