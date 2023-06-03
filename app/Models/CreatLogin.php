<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatLogin extends Model
{
    use HasFactory;
    protected $fillable = [
       'idAdulte','idEnfant','UserName','login'
    ];
}
