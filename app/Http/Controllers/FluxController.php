<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Bookmarks;
use Auth;
use Session;
use DB;

class FluxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $json = file_get_contents("https://newsapi.org/v1/articles?source=bbc-sport&sortBy=top&apiKey=ba5ec29198814d8f8d0cb705431b6978");
        $obj = json_decode($json);
        
        $titlesBookmarks = DB::table('bookmarks')->get(['title']);
        $bookmarksArray = array();
        foreach($titlesBookmarks as $bookmark){
            array_push($bookmarksArray, $bookmark->title);
        }
        return view('flux')->with("articles", $obj->articles)->with("bookmarks", $bookmarksArray);
    }

}
