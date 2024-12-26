<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    // Define fillable fields
    protected $fillable = [
        'address',
        'resident_name',
        'status',
    ];

    // Define relationship with MaintenanceRequest
    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }
}
