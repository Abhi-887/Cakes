<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider2 extends Model
{
    use HasFactory;

    protected $table = 'sliders2';

    public function sliderCategory2()
    {
        return $this->belongsTo(SliderCategory2::class, 'category_id');
    }
}
