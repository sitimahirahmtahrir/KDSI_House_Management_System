<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Define the table name if it is not "users"
    protected $table = 'users';

    // Define the fillable fields
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * Hide sensitive fields.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Define the relationship with the MaintenanceRequest model.
     */
    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class, 'requested_by');
    }
}
