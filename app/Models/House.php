<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'houses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'status', // Options: 'Vacant', 'Occupied', 'Under Maintenance'
    ];

    /**
     * Define a relationship with the Guest model if applicable.
     */
    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    /**
     * Define a relationship with the MaintenanceRequest model.
     */
    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }
}
