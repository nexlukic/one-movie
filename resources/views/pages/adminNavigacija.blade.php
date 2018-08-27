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
        @foreach($navigacija as $n)
        <tr>
            <td>{{$n->id}}</td>
            <td>{{$n->naziv}}</td>
            <td> <a href="{{route('izbrisi_navigaciju',[$n->id])}}">Izbrisi</a></td>
            <td> <a href="{{route('izmeni_navigaciju',[$n->id])}}">Izmeni</a></td>
        </tr>
            @endforeach()
        </tbody>
    </table>
    <table>
        <form method="post" action="{{route('dodaj_navigaciju')}}">
            {{csrf_field()}}
            <input type="text" name="naziv">
            <input type="submit" value="dodaj">
        </form>
    </table>
@endsection
