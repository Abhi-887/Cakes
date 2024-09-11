<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'visitor_id',
        'session_start',
        'session_end',
        'page_views',
    ];

    // Automatically cast these fields to Carbon instances
    protected $casts = [
        'session_start' => 'datetime',
        'session_end' => 'datetime',
    ];
}
