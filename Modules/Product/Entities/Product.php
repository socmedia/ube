<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug_name', 'spesification', 'description', 'position', 'show_in_homepage',
    ];

    public function images()
    {
        return $this->hasMany(ProductsImage::class, 'products_id', 'id')->orderBy('position');
    }

    public function thumbnail()
    {
        return $this->hasOne(ProductsImage::class, 'products_id', 'id')->where('position', 1);
    }

    public static function getHomePageProducts()
    {
        return static::query()->where('show_in_homepage', 1)
            ->with('images:products_id,image_path,position');
    }
}