<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RssManagerController extends Controller
{
    /**
     * Show the RSS Reader dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rss-reader.home');
    }
}
