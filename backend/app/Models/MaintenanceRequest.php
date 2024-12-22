<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;

    // Define the table name if it is not "maintenance_requests"
    protected $table = 'maintenance_requests';

    // Define the fillable fields
    protected $fillable = [
        'house_id',
        'description',
        'status',
        'requested_by',
        'image',
    ];

    /**
     * Define the relationship with the House model.
     */
    public function house()
    {
        return $this->belongsTo(House::class);
    }

    /**
     * Define the relationship with the User model.
     */
    public function requestedBy()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }
}
