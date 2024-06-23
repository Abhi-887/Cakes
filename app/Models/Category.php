<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent', 'slug', 'status', 'show_at_home'];
	
	 public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent');
    }
}
