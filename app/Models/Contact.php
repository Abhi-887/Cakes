<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_one',
        'phone_two',
        'phone_image',
        'mail_one',
        'mail_two',
        'email_image',
        'address',
        'map_link',
        'title_one',
        'Description_one',
        'title_two',
        'Description_two',
        'title_three',
        'Description_three',

    ];
}
