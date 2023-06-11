<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parentenfant extends Model
{
    protected $fillable = [
        'typeParent', 'nomParent', 'PrenomParent', 'CINE', 'DateNaissanceParent', 'telParent', 'Address'
    ];
}
