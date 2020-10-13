<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNewRssRequest;
use App\Rss;
use Illuminate\Http\Request;
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
        return redirect()->route('view-rss', ['rssId' => $rss->id]);
    }

    /**
     * View a RSS.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(string $rssId)
    {
        $rss = Auth::user()->rss()->where('id', $rssId)->firstOrFail();

        //ToDo - This should live in a separate class (repository or service) that return a controller resource (e.g. a RSS View Object)
        try {
            $rssContent = null;
            $content = file_get_contents($rss->url);
            $rssContent = new \SimpleXmlElement($content);
        } catch (\Exception $e) {
            //ToDo - Handle this exception?
        }

        return view('rss-reader.view-rss', compact('rssContent', 'rss'));
    }
}
