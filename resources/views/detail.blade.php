
@extends('layouts.app')
<!-- Styles -->
        
        
@section('content')

            <div class="container">
                <h1>
                        <a target="_blank" href="{{$url}}">{{$title}}</a>                       
                </h1><br>

                <img class="img-responsive" src="{{$urlToImage}}"><br>
                <div>
                    @foreach($items as $e)
                        @if($e != $items[0])
                            @if ($e->tagName == "p")
                            <p>
                                @foreach($e->childNodes as $echildren)
                                    @if (isset($echildren->tagName) && $echildren->tagName == "b")
                                    <b>
                                        {{$echildren->nodeValue}}
                                    </b>
                                    @else
                                    {{$e->nodeValue}}
                                    @endif
                                @endforeach                                
                            </p>
                            @elseif ($e->tagName == "ul")
                            <ul>
                                @foreach($e->childNodes as $echildren)
                                <li>
                                    {{$echildren->nodeValue}}
                                </li>
                                @endforeach
                            </ul>
                            @elseif ($e->tagName == "h2")
                            <h2>
                                {{$e->nodeValue}}
                            </h2>
                            @elseif ($e->tagName == "h3")
                            <h3>
                                {{$e->nodeValue}}
                            </h3>
                            @elseif ($e->tagName == "h4")
                            <h4>
                                {{$e->nodeValue}}
                            </h4>
                            @endif
                        @endif
                    @endforeach
                </div>
                <div>
                    <div style='z-index:1' class='fb-share-button' data-href='{{ $url }}' data-layout='button_count' data-size='small' data-mobile-iframe='true'>
                        <a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse'>Partager</a>
                    </div>
                    <div class='g-plus' data-action='share' data-href='{{ $url }}'></div>&nbsp;
                    <a href='https://twitter.com/share' class='twitter-share-button' data-text='Je pense que ça peut vous intéresser !' data-url='{{ $url }}' data-show-count='false'>Tweet</a>
                </div>
                
            </div>
        
        @endsection
        
        <!-- scripts pour les boutons de partage + css modifié pour aligner le bouton facebook-->
        <script src="https://apis.google.com/js/platform.js" async defer>{lang: 'en-GB'}</script>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>