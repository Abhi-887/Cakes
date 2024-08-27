<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    // Relationship with Category for category_id
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relationship with Category for sub_category_id
    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }
}
