<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Captcha extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'email', 'telephone', 'driving_license', 'why_ideal','relevant_experience','current_position_duration'];
}
