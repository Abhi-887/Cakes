<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customerfeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rating',
        'email',
        'services',
        'store',
        'feedback',
    ];
}
