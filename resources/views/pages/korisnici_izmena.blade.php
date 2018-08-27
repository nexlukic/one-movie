@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
        <form class="form-horizontal" action="{{route('izmeni_korisnika')}}" method="POST">
            {{csrf_field()}}
            <fieldset>
                <input type="hidden" name="id" value="{{$korisnik->id_korisnik}}">
                <div id="legend">
                    <legend class="">Izmeni Korisnika</legend>
                </div>
                <div class="control-group">
                    <!-- Username -->
                    <label class="control-label"  for="username">Username</label>
                    <div class="controls">
                        <input type="text" id="username" value="{{$korisnik->username}}" name="username" placeholder="" class="input-xlarge">
                        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- E-mail -->
                    <label class="control-label" for="email">E-mail</label>
                    <div class="controls">
                        <input type="text" id="email" value="{{$korisnik->email}}" name="email" placeholder="" class="input-xlarge">
                        <p class="help-block">Please provide your E-mail</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- Password-->
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" id="password" value="{{$korisnik->password}}" name="password" placeholder="" class="input-xlarge">
                        <p class="help-block">Password should be at least 4 characters</p>
                    </div>
                </div>
                <div class="control-group">
                    <!-- Password-->
                    <label class="control-label"  for="password">Telefon</label>
                    <div class="controls">
                        <input type="text" id="password" value="{{$korisnik->telefon}}" name="telefon" placeholder="" class="input-xlarge">
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
                        <button class="btn btn-success">Izmeni</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    @endsection