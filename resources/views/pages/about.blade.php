@extends('layouts.front')
@section('content')

        <div class="container">


            <div class="w3lsaboutaits-grids">
                <div class="col-md-6 mx-auto w3lsaboutaits-grid w3lsaboutaits-grid-1">
                    <h3 style="margin-top: 150px;">{{$about->naslov}}</h3>
                    <p style="margin-top: 50px;">{{$about->tekst}}</p>
                    <br>

                    <div id="anketa">
                        <form action="" id="anketaform">       {{--poziva se ajax--}}
                    {{csrf_field()}}

                        @foreach($zanrovi as $zanr)

                                <input type="radio" name="zanr" value="{{$zanr->id}}"> <span>{{$zanr->naziv}}</span> <br>

                        @endforeach
                            @if(session()->get('user'))
                                <button class="btn btn-default">oceni</button>
                            @else
                                <span>ulogujte se prvo</span>
                            @endif
                        </form>
                    </div>

                </div>
                <div class="col-md-6 w3lsaboutaits-grid w3lsaboutaits-grid-2">
                    <img src="{{asset($about->putanja)}}" width="500px" height="500px" alt="Game Robo">
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    @endsection