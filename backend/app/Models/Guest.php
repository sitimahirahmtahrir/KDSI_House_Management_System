<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    // Define the table name if it is not "guests"
    protected $table = 'guests';

    // Define the fillable fields
    protected $fillable = [
        'name',
        'check_in_date',
        'check_out_date',
        'house_id',
        'purpose',
    ];

    /**
     * Define the relationship with the House model.
     */
    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
