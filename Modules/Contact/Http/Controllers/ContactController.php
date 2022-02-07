<?php

namespace Modules\Contact\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('contact::index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function attribute()
    {
        return view('contact::attribute');
    }
}