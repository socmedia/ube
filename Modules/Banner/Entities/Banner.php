<?php

namespace Modules\Banner\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_type', 'name', 'thumbnail', 'media_path', 'alt', 'references_url', 'position', 'is_active',
    ];

    public static function getBanners()
    {
        return static::query()->where('is_active', 1)->orderBy('position')->get();
    }
}