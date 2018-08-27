@extends('layouts.admin')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">naziv</th>
        </tr>
        </thead>
        <tbody>
        @foreach($zanr as $z)
            <tr>
                <td>{{$z->id}}</td>
                <td>{{$z->naziv}}</td>
                <td> <a href="{{route('zanrDelete',[$z->id])}}">Izbrisi</a></td>
                <td> <a href="{{route('zanrUpdate',[$z->id])}}">Izmeni</a></td>
            </tr>
        @endforeach()
        </tbody>
    </table>
    <table>
        <form method="post" action="{{route('zanrAdd')}}">
            {{csrf_field()}}
            <input type="text" name="naziv">
            <input type="submit" value="dodaj">
        </form>
    </table>
    @endsection()