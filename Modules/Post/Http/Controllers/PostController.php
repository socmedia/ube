<?php

namespace Modules\Post\Http\Controllers;

use App\Traits\FileHandler;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    use FileHandler;
    /**
     * Upload image to storage
     * @return Renderable
     */
    public function upload(Request $request)
    {
        $image = $this->uploadMedia($request->file('image'), 'img', now()->toDateString());

        return response()->json([
            'status' => 200,
            'message' => 'Image successfully uploaded',
            'image_link' => $image,
        ]);
    }
}