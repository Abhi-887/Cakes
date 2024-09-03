<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    function productImages(): HasMany
    {
        return $this->hasMany(ProductGallery::class);
    }

    function productSizes(): HasMany
    {
        return $this->hasMany(ProductSize::class);
    }

    function productOptions(): HasMany
    {
        return $this->hasMany(ProductOption::class);
    }

    function reviews(): HasMany
    {
        return $this->hasMany(ProductRating::class, 'product_id', 'id');
    }

    // In your Product model (App\Models\Product)
    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);

    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'coupon_product');
    }

}
