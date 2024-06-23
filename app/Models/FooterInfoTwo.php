<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterInfoTwo extends Model
{
    use HasFactory;
	protected $table='footer_infos_two';

    protected $fillable = [
        'name',
		'phone',
        'email',
        'address',
        'copyright'
    ];
}
