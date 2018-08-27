<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');

});
Route::get('/home','FrontController@home')->name('HOME');

Route::get('/list','FrontController@list')->name('A-Z-LIST');
Route::get('/sortiraj/{slovo}','FrontController@sortiraj')->name('sortiraj');
Route::get('/brojpregleda/{id}','FrontController@brojpregleda')->name('brojpregleda');
Route::get('/sortirajZanr/{drama}','FrontController@sortirajZanr')->name('sortirajZanr');
Route::get('/about','FrontController@about')->name('ABOUT');
Route::get('/single/{id}','FrontController@single')->name('single')->middleware('provera');;
Route::post('/login','FrontController@login')->name('login');
Route::post('/register','FrontController@register')->name('register');
Route::get('/logout','FrontController@logout')->name('logout');
Route::get('/komentari','FrontController@komentari')->name('komentari');
Route::post('/dodajKomentar','FrontController@dodajKomentar')->name('dodajKomentar');
Route::get('/obrisiKomentar/{id}','FrontController@obrisiKomentar')->name('obrisiKomentar');


Route::group(['middleware' => 'admin'],function(){
Route::get('/admin','Admin@admin')->name('admin');
Route::get('/korisnici','Admin@korisnici')->name('korisnici');
Route::get('/izbrisi_korisnika/{id}','Admin@izbrisi_korisnika')->name('izbrisi_korisnika');
Route::get('/korisnici_izmena/{id}','Admin@korisnici_izmena')->name('korisnici_izmena');
Route::POST('/izmeni_korisnika','Admin@izmeni_korisnika')->name('izmeni_korisnika');
Route::POST('/dodaj_korisnika','Admin@dodaj_korisnika')->name('dodaj_korisnika');
Route::get('/navigacija','Admin@navigacija')->name('navigacija');
Route::POST('/dodaj_navigaciju','Admin@dodaj_navigaciju')->name('dodaj_navigaciju');
Route::get('/izbrisi_navigaciju/{id}','Admin@izbrisi_navigaciju')->name('izbrisi_navigaciju');
Route::get('/izmeni_navigaciju/{id}','Admin@izmeni_navigaciju')->name('izmeni_navigaciju');
Route::POST('/navigacija_update','Admin@navigacija_update')->name('navigacija_update');
Route::get('/zanr','Admin@zanr')->name('zanr');
Route::get('/zanrDelete/{id}','Admin@zanrDelete')->name('zanrDelete');
Route::get('/zanrUpdate/{id}','Admin@zanrUpdate')->name('zanrUpdate');
Route::POST('/zanrIzmeni','Admin@zanrIzmeni')->name('zanrIzmeni');
Route::POST('/zanrAdd','Admin@zanrAdd')->name('zanrAdd');
Route::get('/filmovi','Admin@dohvati')->name('filmovi');
Route::POST('filmAdd','Admin@filmAdd')->name('filmAdd');
Route::get('filmDelete/{id}','Admin@filmDelete')->name('filmDelete');
Route::get('filmUpdate/{id}','Admin@filmUpdate')->name('filmUpdate');
Route::POST('filmIzmeni','Admin@filmIzmeni')->name('filmIzmeni');


Route::get('/anketa', 'Admin@anketa')->name('anketa');
Route::get('/admin/anketa/{id}', 'Admin@anketadelete')->name('anketaDelete');
});

Route::post('/anketaa','FrontController@anketa');