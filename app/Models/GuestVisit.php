<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestVisit extends Model
{
    use HasFactory;

    // Define table name if it's different from the pluralized model name
    // protected $table = 'guest_visits';

    // Specify fillable fields for mass assignment
    protected $fillable = [
        'guest_name',
        'guest_id',
        'house_id',
        'check_in_time',
        'check_out_time',
        'verification_status',
    ];
}
