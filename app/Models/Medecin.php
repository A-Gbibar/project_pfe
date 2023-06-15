<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;
    protected $fillable = [
        'idMedecins' , 'nom', 'prenom', 'CINE', 'ville', 'Sexs', 'DateNaissance', 'tel', 'Address', 'Diagnostic', 'photo'
    ];
}
