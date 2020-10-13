<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNewRssRequest;
use App\Rss;
use Illuminate\Support\Facades\Auth;

class RssManagerController extends Controller
{
    /**
     * Show the RSS Reader dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rssList = Auth::user()->rss->all();
        return view('rss-reader.home', compact(['rssList']));
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
     
    /**
     * Add a RSS.
     *
     * @return \Illuminate\Http\Response
     */
    public function post(AddNewRssRequest $request)
    {
        $rss = $request->persist();

        //ToDo - Redirect to the view page once available
        return redirect()->route('rss-manager-home');
    }
}
