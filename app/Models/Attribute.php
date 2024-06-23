<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
	use HasFactory;

	protected $table = 'product_attrs';
	protected $fillable = ['title', 'input_type', 'is_required', 'short_order', 'option_description', 'product_id'];

	// Define relationships, if any
	public function subAttributes()
	{
		return $this->hasMany(SubAttribute::class);
	}



}
