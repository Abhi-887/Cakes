<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

	 public function sliderCategory()
	{
		return $this->belongsTo(SliderCategory::class, 'category_id');
	}
}
