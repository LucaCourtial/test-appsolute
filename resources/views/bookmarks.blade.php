
@extends('layouts.app')
<!-- Styles -->
        
        
@section('content')

            <div class="container">

                
                <h1>
                    <center>
                        Bookmarks
                    </center>                        
                </h1>

                <div>
                <ul class="list-group">
                   @foreach($bookmarks as  $bookmark)
                        <li class="list-group-item list-group-item-info"><b> {{ $bookmark->title }}</b>
                        <ul class="list-group">
                            <li class="list-group-item"><i>{{ date("d/m/Y - h:i:s", strtotime($bookmark->publishedAt)) }}</i></li>
                            <li class="list-group-item"><div class="row">
                                        <div class="col-md-2">
                                            <img src='{{ $bookmark->urlToImage }}' class='img-responsive'>
                                        </div>
                                        <div class="col-md-10">
                                            {{ $bookmark->description }}
                                        </div>
                                    </div></li>
                            <li class="list-group-item">
                                <div style='z-index:1' class='fb-share-button' data-href='{{ $bookmark->url }}' data-layout='button_count' data-size='small' data-mobile-iframe='true'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse'>Partager</a>
                                </div>
                                <div class='g-plus' data-action='share' data-href='{{ $bookmark->url }}'></div>&nbsp;
                                <a href='https://twitter.com/share' class='twitter-share-button' data-text='Je pense que ça peut vous intéresser !' data-url='{{ $bookmark->url }}' data-show-count='false'>Tweet</a></li>
                        </ul>
                            {{ Form::open(['method' => 'DELETE', 'url' => '/bookmarks/'.$bookmark->title]) }}
                            {{ Form::submit('Delete bookmarks', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                    </li>
                    @endforeach         
                </ul>
            </div>
                

        </div>
        
        @endsection
        
        <!-- scripts pour les boutons de partage + css modifié pour aligner le bouton facebook-->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.10";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>