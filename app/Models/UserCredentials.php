<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserCredentials extends Authenticatable
{
    use HasFactory;
    protected $table = 'users_credentials';

    protected $fillable = ['username', 'email', 'password'];
}


