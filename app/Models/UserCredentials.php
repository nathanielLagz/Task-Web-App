<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCredentials extends Model
{
    use HasFactory, Authenticatable;
    protected $table = 'users_credentials';

    protected $fillable = ['username','email', 'password'];
}


