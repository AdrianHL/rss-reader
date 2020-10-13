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
 
    /**
     * Show the Add RSS Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('rss-reader.add-rss');
    }
}
