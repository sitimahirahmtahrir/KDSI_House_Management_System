<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;

    protected $fillable = ['house_id', 'description', 'status'];

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
