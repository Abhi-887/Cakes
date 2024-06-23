<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderCategory extends Model
{
    use HasFactory;
	
	    protected $table = 'slider_category';

    // Allow all attributes to be mass assignable
    protected $guarded = [];

    // Indicates if the model should be timestamped
    public $timestamps = true;
}
