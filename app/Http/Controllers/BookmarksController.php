<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Bookmarks;
use Auth;
use Session;
use DB;

class BookmarksController extends Controller
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
     * Show user's bookmarks.
     *
     * @return Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        
        $bookmarks =  DB::table('bookmarks')->get()->where('user_id', $user_id);
        
        return view('bookmarks')->with("bookmarks", $bookmarks);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
     public function store()
    {
        $rules = array(
            'title'       => 'required',
            'description' => 'required',
            'url'         => 'required',
            'urlToImage'  => 'required',
            'publishedAt' => 'required',
            
        );
        
        $validator = Validator::make(Input::all(), $rules);
        
        $bookmarkTest = DB::table('bookmarks')->get()->where('user_id', Auth::user()->id)->where('title', Input::get("title"));
        
        //si echec de validator OU utilisateur non connecté OU si le favori existe déjà
        if ($validator->fails() || !Auth::check() || !$bookmarkTest->isEmpty()) {
            return Redirect::to('/flux')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $bookmark = new Bookmarks();
            $bookmark->title = Input::get("title");
            $bookmark->description = Input::get("description");
            $bookmark->url = Input::get("url");
            $bookmark->urlToImage = Input::get("urlToImage");
            $bookmark->publishedAt = Input::get("publishedAt");
            $bookmark->user_id = Auth::user()->id;
            $bookmark->save();

            // redirect
            Session::flash('message', 'Successfully saved in yours bookmarks!');
            return Redirect::to('/flux');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $title
     * @return Response
     */
    public function destroy($title)
    {
        // delete
        $bookmark = Bookmarks::where('user_id', Auth::user()->id)->where('title', $title);
        $bookmark->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the bookmark!');
        return Redirect::to('/bookmarks');
    }

}
