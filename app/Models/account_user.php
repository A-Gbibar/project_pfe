<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'idClient', 'type', 'userName', 'email', 'password', 'Accept'
    ];
}
