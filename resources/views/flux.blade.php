
@extends('layouts.app')
<!-- Styles -->
        
        
@section('content')

            <div class="container">

                <h1>
                    <center>
                        Flux
                    </center>                       
                </h1>

                <div>
                <ul class="list-group">
                    @foreach($articles as  $article)
                        @if (Auth::guest() || in_array($article->title, $bookmarks))
                        <li class="list-group-item list-group-item-info"><b><a target="_BLANK" href="{{ $article->url }}"> {{ $article->title }}</a></b>
                                <ul class="list-group">
                                    <li class="list-group-item"><i>{{ date("d/m/Y - h:i:s", strtotime($article->publishedAt)) }}</i></li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src='{{ $article->urlToImage }}' class='img-responsive'>
                                            </div>
                                            <div class="col-md-10">
                                                {{ $article->description }}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item"><div><div style='z-index:1' class='fb-share-button' data-href='{{ $article->url }}' data-layout='button_count' data-size='small' data-mobile-iframe='true'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse'>Partager</a></div>&nbsp;
                                             <div class='g-plus' data-action='share' data-href='{{ $article->url }}'></div>&nbsp;
                                             <a href='https://twitter.com/share' class='twitter-share-button' data-text='Je pense que ça peut vous intéresser !' data-url='{{ $article->url }}' data-show-count='false'>Tweet</a></div></li>
                                </ul>
                        @else
                            <li class="list-group-item list-group-item-info titleFlux"><b><a target="_BLANK" href="{{ $article->url }}"> {{ $article->title }}</a></b>
                                <ul class="list-group">
                                <li class="list-group-item"><i>{{ date("d/m/Y - h:i:s", strtotime($article->publishedAt)) }}</i></li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src='{{ $article->urlToImage }}' class='img-responsive'>
                                        </div>
                                        <div class="col-md-10">
                                            {{ $article->description }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div style='z-index:1' class='fb-share-button' data-href='{{ $article->url }}' data-layout='button_count' data-size='small' data-mobile-iframe='true'>
                                        <a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse'>Partager</a>
                                    </div>
                                    <div class='g-plus' data-action='share' data-href='{{ $article->url }}'></div>
                                    <a href='https://twitter.com/share' class='twitter-share-button' data-text='Je pense que ça peut vous intéresser !' data-url='{{ $article->url }}' data-show-count='false'>Tweet</a>
                                        
                                </li>
                            </ul>
                            {{ Form::open(['method' => 'POST', 'url' => '/bookmarks']) }}
                            {{ Form::hidden('title', $article->title) }}
                            {{ Form::hidden('description', $article->description) }}
                            {{ Form::hidden('urlToImage', $article->urlToImage) }}
                            {{ Form::hidden('publishedAt', $article->publishedAt) }}
                            {{ Form::hidden('url', $article->url) }}
                            {{ Form::submit('Add to bookmarks', array('class' => 'btn btn-primary')) }}
                            {{ Form::close() }}
                        @endif
                            
                        </li>
                    @endforeach                   
                </ul>
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
        
        
        