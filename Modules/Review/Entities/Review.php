<?php

namespace Modules\Review\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'review', 'is_active',
    ];

    public static function getReviews()
    {
        return static::query()->where('is_active', 1);
    }
}