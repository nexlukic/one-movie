@extends('layouts.admin')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Naziv</th>
            <th scope="col">Datum_dodavanja</th>
            <th scope="col">Dadum_izmene</th>
            <th scope="col">slika</th>
            <th scope="col">Zanr</th>
        </tr>
        </thead>
        <tbody>
        @foreach($filmovi as $f)
        <tr>
            <td>{{$f->id_filma}}</td>
            <td>{{$f->ime}}</td>
            <td>{{$f->datum_dodavanja}}</td>
            <td>{{$f->datum_izmene}}</td>
            <td><img src="images/{{$f->putanja}}"></td>
            <td>{{$f->naziv}}</td>
            <td> <a href="{{route('filmDelete',[$f->id_filma])}}">Izbrisi</a></td>
            <td> <a href="{{route('filmUpdate',[$f->id_filma])}}">Izmeni</a></td>
        </tr>
            @endforeach()

        </tbody>
    </table>
    {{$filmovi->render()}}
    <form method="post" action="{{route('filmAdd')}}" enctype='multipart/form-data'>
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Naziv</label>
            <input type="text" name="naziv" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Embeded Link</label>
            <input type="text" class="form-control" name="link" id="exampleInputPassword1">
        </div>
        <div class="form-group">
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

        <button type="Dodaj film" class="btn btn-primary">Submit</button>
    </form>
    @endsection()