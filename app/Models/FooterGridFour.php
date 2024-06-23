<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterGridFour extends Model
{
    use HasFactory;
    protected $tabel = 'footer_grid_four';
    protected $fillable = ['name', 'url', 'status'];
}
