<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weddingcakesdeposit extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural form of the model name
    // protected $table = 'weddingcakesdeposits';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'consultation_preference',
        'existing_design',
        'wedding_date',
    ];
}
