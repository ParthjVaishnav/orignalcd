<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infos extends Model
{
    use HasFactory;

    protected $table = 'infos'; // Ensures Laravel uses the correct table name
    protected $fillable = ['name', 'email', 'password']; // Allow mass assignment
    public $timestamps = false; // Disable timestamps if not used
}
 // Make sure these match your form fields

