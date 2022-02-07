<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class MediaController extends Controller
{
    public function getBannerImage($imageName)
    {
        $path = storage_path('app/public/images/banner/' . $imageName);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'images');
        return $response;
    }

    public function getBannerVideo($videoName)
    {
        $path = storage_path('app/public/videos/banner/' . $videoName);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'video');
        return $response;
    }

    public function getBlogImage($imageName)
    {
        $path = storage_path('app/public/images/blogs/' . $imageName);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'images');
        return $response;
    }

    public function getServiceImage($imageName)
    {
        $path = storage_path('app/public/images/services/' . $imageName);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'images');
        return $response;
    }

    public function getProductImage($imageName)
    {
        $path = storage_path('app/public/images/products/' . $imageName);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'images');
        return $response;
    }

    public function getCatalogue($catalogueName)
    {
        $path = storage_path('app/public/files/catalogue/' . $catalogueName);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $response = Response::make($file, 200);
        $response->header('Content-Type', '');
        return $response;
    }
}