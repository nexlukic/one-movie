@extends('layouts.front');
@section('content')
    <div class="general-agileits-w3l">
        <div class="w3l-medile-movies-grids">

            <!-- /movie-browse-agile -->

            <div class="movie-browse-agile">
                <div class="browse-agile-w3ls general-w3ls">
                    <div class="tittle-head">
                        <h4 class="latest-text">Family Movies </h4>
                        <div class="container">
                            <div class="agileits-single-top">
                                 @if($errors->any())
                                    <h1 class="text-danger">{{$errors->first()}}</h1>
                                @endif
                                <ol class="breadcrumb">
                                    <li><a href="{{route('HOME')}}">Home</a></li>
                                    @foreach($zanrovi as $zanr)
                                        <li class="active zanr"><a href="#">{{$zanr->naziv}}</a></li>
                                        @endforeach()
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="browse-inner" id="filmovi">


                           @foreach($filmovi as $film)
                            <div id="broj" value="{{$film->id}}" class="col-md-2 w3l-movie-gride-agile">
                                <a href="{{route('single',[$film->id])}}"  class="hvr-shutter-out-horizontal"><img src="{{asset('images/'.$film->putanja)}}" height="200" width="150" title="album-name" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1">
                                    <div class="w3l-movie-text">
                                        <h6><a href="{{route('single',[$film->id])}}">{{$film->naziv}}</a></h6>
                                    </div>
                                    <div class="mid-2">

                                        <p>{{$film->datum_dodavanja}}</p>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                                <div class="ribben two">
                                    <p>NEW</p>
                                </div>
                            </div>
                            @endforeach()

                        </div>
                    </div>
                </div>
                <div id="render" class="clearfixe text-center">
                    {{$filmovi->render()}}
                </div>
            </div>
            <!-- //movie-browse-agile -->
            <!--body wrapper start-->
            <!--body wrapper start-->

        </div>
        <!-- //w3l-medile-movies-grids -->
    </div>
    @endsection