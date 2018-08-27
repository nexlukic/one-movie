@extends('layouts.admin')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">username</th>
            <th scope="col">password</th>
            <th scope="col">email</th>
            <th scope="col">telefon</th>
            <th scope="col">uloga</th>
        </tr>
        </thead>
        <tbody>
        @foreach($korisnici as $k)
        <tr>
            <td>{{$k->id_korisnik}}</td>
            <td>{{$k->username}}</td>
            <td>{{$k->password}}</td>
            <td>{{$k->email}}</td>
            <td>{{$k->telefon}}</td>
            <td>{{$k->naziv}}
            <td> <a href="{{route('izbrisi_korisnika',[$k->id_korisnik])}}">Izbrisi</a></td>
            <td> <a href="{{route('korisnici_izmena',[$k->id_korisnik])}}">Izmeni</a></td>

        </tr>
            @endforeach()

        </tbody>
    </table>
    <div class="col-lg-12">
    <form class="form-horizontal" action="{{route('dodaj_korisnika')}}" method="POST">
        {{csrf_field()}}
        <fieldset>
            <div id="legend">
                <legend class="">Dodaj Korisnika</legend>
            </div>
            <div class="control-group">
                <!-- Username -->
                <label class="control-label"  for="username">Username</label>
                <div class="controls">
                    <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                    <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                </div>
            </div>

            <div class="control-group">
                <!-- E-mail -->
                <label class="control-label" for="email">E-mail</label>
                <div class="controls">
                    <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                    <p class="help-block">Please provide your E-mail</p>
                </div>
            </div>

            <div class="control-group">
                <!-- Password-->
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                    <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                    <p class="help-block">Password should be at least 4 characters</p>
                </div>
            </div>
            <div class="control-group">
                <!-- Password-->
                <label class="control-label" for="password">Telefon</label>
                <div class="controls">
                    <input type="text" id="password" name="telefon" placeholder="" class="input-xlarge">
                    <p class="help-block">Password should be at least 4 characters</p>
                </div>
            </div>
            <div class="control-group">
                <!-- Password-->
                <label class="control-label" for="password">Uloga</label>
                <div class="controls">
                   <select name="id_uloga">
                       <option value="2">Korisnik</option>
                       <option value="1">Admin</option>
                   </select>
                </div>
            </div>


            <div class="control-group">
                <!-- Button -->
                <div class="controls">
                    <button class="btn btn-success">Dodaj</button>
                </div>
            </div>
        </fieldset>
    </form>
    </div>
    @endsection()