@extends('layouts.admin')
@section('content')
    <form method="post" action="{{route('navigacija_update')}}">
        {{csrf_field()}}
        <input type="hidden" value="{{$nav->id}}" name="id">
        <input type="text" value="{{$nav->naziv}}" name="naziv">
        <input type="submit" value="Izmeni">
    </form>
    @endsection()