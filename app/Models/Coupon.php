<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'quantity',
        'min_purchase_amount',
        'start_date',
        'expire_date',
        'discount_type',
        'discount',
        'max_uses_per_user',
        'apply_by',
        'category_id',
        'sub_category_id',
        'status',
    ];

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

    public function products()
{
    return $this->belongsToMany(Product::class);
}

}
