<?php

namespace App\Http\Controllers;

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
     * Show the flux from bbc news.
     *
     * @return Response
     */
    public function index()
    {
        //recuperation du flux JSON de bbc sport
        $json = file_get_contents("https://newsapi.org/v1/articles?source=bbc-sport&sortBy=top&apiKey=ba5ec29198814d8f8d0cb705431b6978");
        $obj = json_decode($json);
        
        //servira à vérifier dans la vue via Blade si l'article est dans les favoris
        $titlesBookmarks = DB::table('bookmarks')->get(['title']);
        $bookmarksArray = array();
        foreach($titlesBookmarks as $bookmark){
            array_push($bookmarksArray, $bookmark->title);
        }
        
        return view('flux')->with("articles", $obj->articles)->with("bookmarks", $bookmarksArray);
    }

}
