<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Extend Authenticatable for login

class Student extends Authenticatable
{
    use HasFactory;

    protected $table = 'students'; // Specify your table name

    protected $fillable = [
        'name',
        'email',
        'password', // Required for authentication
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
