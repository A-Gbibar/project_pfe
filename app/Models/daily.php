<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daily extends Model
{
    use HasFactory;
    protected $fillable = [
        'DateHoraires', 'HoureStart', 'HoureFin', 'UserNameUser', 'idU', 'UserNameDocter', 'idD' , 'description'
    ];
}
