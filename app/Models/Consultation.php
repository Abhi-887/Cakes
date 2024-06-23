<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural form of the model name
    // protected $table = 'consultations';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'first_name',
        'surname',
        'email',
        'phone',
        'event_date',
        'venue',
        'number_of_guests',
        'other_information',
        'cake_budget',
        'consultation_store',
        'consultation_type',
        'existing_order',
        'cake_type',
        'booking_status',
        'consultation_date',
        'consultation_time',
    ];
}
