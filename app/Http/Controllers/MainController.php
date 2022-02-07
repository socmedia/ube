<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Post\Entities\Post;

class MainController extends Controller
{
    /**
     * Show homepage on company profile
     *
     * @return void
     */
    public function index()
    {
        return view('pages.index');
    }

    /**
     * Show about us on company profile
     *
     * @return void
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Show post on company profile
     *
     * @return void
     */
    public function post(Request $request)
    {
        return view('pages.post');
    }

    /**
     * Show postDetail on company profile
     *
     * @return void
     */
    public function postDetail(Post $post)
    {
        return view('pages.post-single', [
            'post' => $post,
        ]);
    }

    /**
     * Show review on company profile
     *
     * @return void
     */
    public function review()
    {
        return view('pages.review');
    }

    /**
     * Show faq on company profile
     *
     * @return void
     */
    public function faq()
    {
        return view('pages.faq');
    }

    /**
     * Show homepage on company profile
     *
     * @return void
     */
    public function contact()
    {
        return view('pages.contact');
    }
}