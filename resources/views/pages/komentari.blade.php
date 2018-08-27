@extends('layouts.admin')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">tekst</th>
            <th scope="col">id_filma</th>
            <th scope="col">id_korisnika</th>
        </tr>
        </thead>
        <tbody>
        @foreach($komentari_admin as $k)
        <tr>
            <td>{{$k->id_komentar}}</td>
            <td>{{$k->tekst}}</td>
            <td>{{$k->id_filma}}</td>
            <td>{{$k->id_korisnika}}</td>
            <td><a href="{{route('obrisiKomentar',[$k->id_komentar])}}">Obrisi</a></td>
        </tr>
       @endforeach()
        </tbody>
    </table>
@endsection