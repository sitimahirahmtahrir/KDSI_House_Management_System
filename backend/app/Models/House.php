<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    // Define the table name if it is not "houses"
    protected $table = 'houses';

    // Define the fillable fields
    protected $fillable = [
        'name',
        'address',
        'status',
        'type',
    ];

    /**
     * Define the relationship with the Guest model.
     */
    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    /**
     * Define the relationship with the MaintenanceRequest model.
     */
    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }
}
