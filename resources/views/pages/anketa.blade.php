@extends('layouts.admin')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">id_korisnika</th>
            <th scope="col">Zanr</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
   


                @foreach($podaci as $p)
                <tr>
                <td>{{$p->id_anketa}}</td>
                <td>{{$p->id_user}}</td>
                <td>{{$p->naziv}}</td>
                <td><a href="{{url('/admin/anketa')}}/{{$p->id_anketa}}"> delete</a></td>
                </tr>
                @endforeach


            


        </tbody>
    </table>

@endsection