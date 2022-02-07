<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('post::status.index');
    }
}