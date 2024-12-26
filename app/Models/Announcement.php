<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Announcement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'content', 'published_at'];

    protected $dates = ['published_at', 'deleted_at'];

    public function scopeSearch($query, $term)
    {
        return $query->where('title', 'like', "%{$term}%")
            ->orWhere('content', 'like', "%{$term}%");
    }
}

