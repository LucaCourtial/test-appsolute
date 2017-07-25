<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Bookmarks;
use Auth;
use Session;
use DB;

class DetailController extends Controller
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
    public function index($title)
    {
       $url = "";
       $urlToImage = "";
       $flux = FluxController::getFlux();
       foreach($flux->articles as $elem){
           if($elem->title == $title){
               $url = $elem->url;
               $urlToImage = $elem->urlToImage;
           }
       }
        
        $doc = new \DOMDocument;

        // We don't want to bother with white spaces
        $doc->preserveWhiteSpace = false;

        // Most HTML Developers are chimps and produce invalid markup...
        $doc->strictErrorChecking = false;
        $doc->recover = true;
        libxml_use_internal_errors(true);
        $doc->loadHTMLFile($url);

        $xpath = new \DOMXPath($doc);

        //faire la différence entre un article classique et un article live
        $testTypeLive = preg_match('/\/live\//', $url);
        if($testTypeLive == 0){
            $query = "//div[@id='story-body']";
        } else {
            $query = "//div[@class='lx-stream__feed']";
        }
        $entries = $xpath->query($query);

        //var_dump($entries->item(0)->childNodes[0]);
        
        
        
        return view('detail')->with("items", $entries->item(0)->childNodes)
                ->with("url",$url)
                ->with("urlToImage",$urlToImage)
                ->with("title",$title);
    }
}
