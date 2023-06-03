<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adulte extends Model
{
    use HasFactory;
    protected $fillable = [
    'nom', 'Prenom', 'Sexe', 'DateNaissance', 'tel', 'Address', 'Diagnostique', 'Medecin', 'photo'
    ];
}
