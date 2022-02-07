<?php

namespace App\Http\Controllers;

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
     * Show apartment on company profile
     *
     * @return void
     */
    public function apartment()
    {
        return view('pages.apartment');
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