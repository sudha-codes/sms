<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Only these fields can be mass-assigned
    protected $fillable = [
        'name',
        'email',
        'course',
        'marks',
    ];
}
