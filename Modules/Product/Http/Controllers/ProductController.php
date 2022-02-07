<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('product::index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function images($id)
    {
        $product = Product::findOrFail($id);
        return view('product::images');
    }
}