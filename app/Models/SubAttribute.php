<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class SubAttribute extends Model
{

	protected $table = "attr_options";
	protected $fillable = [
		'attribute_id',
		'title',
		'price',
		'price_type',
		'sku',
		'default_se',
		'short_order',
	];

	public function attribute()
	{
		return $this->belongsTo(Attribute::class);
	}

}
