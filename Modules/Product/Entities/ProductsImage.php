<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_id', 'image_path', 'position',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
}