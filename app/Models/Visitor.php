<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    // The table associated with the model (if you follow Laravel's naming convention, this isn't necessary)
    protected $table = 'visitors';

    // The attributes that are mass assignable
    protected $fillable = [
        'ip_address',
        'visitor_id',
    ];
}
