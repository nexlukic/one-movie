@extends('layouts.admin')
@section('content')
    <form method="post" action="{{route('filmIzmeni')}}" enctype='multipart/form-data'>
        {{csrf_field()}}
        <div class="form-group">
            <input type="hidden" name="id_filma" value="{{$film->id_filma}}">
            <label for="exampleInputEmail1">Naziv</label>
            <input type="text" name="naziv" value="{{$film->ime}}" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Embeded Link</label>
            <input type="text" class="form-control" value="{{$film->link}}" name="link" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <img src="{{asset('images/'.$film->putanja)}}">
            <input type="hidden" name="trenutna" value="{{$film->putanja}}">
            <label for="exampleInputFile">Slika</label>
            <input type="file" name="slika" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Zanr</label>
            <select name="id_zanr">
                @foreach($zanrovi as $z)
                    <option value="{{$z->id}}">{{$z->naziv}}</option>
                @endforeach()
            </select>
        </div>
        <button type="Dodaj film" class="btn btn-primary">Izmeni</button>
    </form>
    @endsection()