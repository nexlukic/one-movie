@extends('layouts.admin')
@section('content')
    @foreach($zanr_one as $zanr)
    <form method="post" action="{{route('zanrIzmeni')}}">
        {{csrf_field()}}
        <input type="hidden" value="{{$zanr->id}}" name="id">
        <input type="text" value="{{$zanr->naziv}}" name="naziv">
        <input type="submit" value="Izmeni">
        @endforeach()
    </form>
@endsection()