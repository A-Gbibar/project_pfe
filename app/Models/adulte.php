<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class adulte extends Model
{
    use HasFactory;
    protected $fillable = [
    'nom', 'Prenom', 'UserName' , 'CINE' ,'Sexe', 'DateNaissance', 'tel', 'Address', 'Diagnostique', 'Medecin', 'photo'
    ];


}
