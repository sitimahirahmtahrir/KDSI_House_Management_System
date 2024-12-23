<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'maintenance_requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'house_id',
        'description',
        'status', // Options: 'Pending', 'In Progress', 'Completed'
    ];

    /**
     * Define a relationship with the House model.
     */
    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
