@extends('layouts.front');
@section('content')
    <div class="single-page-agile-main">
        <div class="container">
            <!-- /w3l-medile-movies-grids -->
            <div class="single-page-agile-info">
                <!-- /movie-browse-agile -->
                <div class="show-top-grids-w3lagile">
                    <div class="col-sm-12 single-left">
                        <div class="song">
                            <div class="song-info">
                                <h3>{{$jedan->naziv}}</h3>
                            </div>
                            <div class="video-grid-single-page-agileits">
                                <div><iframe src="{{$jedan->link}}" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" allowfullscreen="true" width="100%" height="480"></iframe> </div>
                            </div>
                        </div>
                        <div class="song-grid-right">
                            <div class="share">
                                <h5>Share this</h5>
                                <div class="single-agile-shar-buttons">
                                    <ul>
                                        <li>
                                            <div class="fb-like" data-href="https://www.facebook.com/w3layouts" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
                                            <script>(function(d, s, id) {
                                                    var js, fjs = d.getElementsByTagName(s)[0];
                                                    if (d.getElementById(id)) return;
                                                    js = d.createElement(s); js.id = id;
                                                    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
                                                    fjs.parentNode.insertBefore(js, fjs);
                                                }(document, 'script', 'facebook-jssdk'));</script>
                                        </li>
                                        <li>
                                            <div class="fb-share-button" data-href="https://www.facebook.com/w3layouts" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fw3layouts&amp;src=sdkpreparse">Share</a></div>
                                        </li>
                                        <li class="news-twitter">
                                            <a href="https://twitter.com/w3layouts" class="twitter-follow-button" data-show-count="false">Follow @w3layouts</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?screen_name=w3layouts" class="twitter-mention-button" data-show-count="false">Tweet to @w3layouts</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                        </li>
                                        <li>
                                            <!-- Place this tag where you want the +1 button to render. -->
                                            <div class="g-plusone" data-size="medium"></div>

                                            <!-- Place this tag after the last +1 button tag. -->
                                            <script type="text/javascript">
                                                (function() {
                                                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                                    po.src = 'https://apis.google.com/js/platform.js';
                                                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                                })();
                                            </script>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>

                        <div class="all-comments">
                            <div class="all-comments-info">
                                <a href="#">Comments</a>
                                <div class="agile-info-wthree-box">
                                    <form method="post" action="{{route('dodajKomentar')}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id_film" value="{{$jedan->id_f}}">
                                        <input type="hidden" name="id_korisnik" value="{{session()->get('user')->id}}">
                                        <textarea placeholder="" name="tekst" required=""></textarea>
                                        <input type="submit" value="SEND">
                                        <div class="clearfix"> </div>
                                    </form>
                                </div>
                            </div>
                            <div class="media-grids">
                                @foreach($komentari as $komentar)
                                <div class="media">

                                    <h5>{{$komentar->username}}</h5>

                                    <div class="media-body">
                                        <p>{{$komentar->tekst}}</p>
                                        <span>Date :<a href="#"> {{$komentar->datum}} </a></span>
                                    </div>
                                    @if($komentar->username==session()->get('user')->username)
                                        <a href="{{route('obrisiKomentar',[$komentar->id_komentar])}}">Izbrisi</a>
                                    @endif()
                                </div>

                               @endforeach()
                            </div>
                        </div>
                    </div>


                        </div>
                    </div>



                    <div class="clearfix"> </div>
                </div>
        <script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
    @endsection()