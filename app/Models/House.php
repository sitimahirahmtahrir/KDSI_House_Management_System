<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'status'];

    public function maintenanceRequests()
    {
    return $this->hasMany(MaintenanceRequest::class);
    }

public function resident()
    {
    return $this->hasOne(Resident::class);
    }

}

