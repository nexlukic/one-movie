<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 17-Mar-18
 * Time: 10:39
 */

namespace App\Models;


class Komentar
{
public function dohvatisve($id){
    $upit=\DB::table('komentar')
        ->select('*','komentar.id as id_komentar')
        ->join('film','film.id','=','komentar.id_filma')
        ->join('korisnik','korisnik.id','=','komentar.id_korisnika')
        ->where([['film.id','=',$id]])
        ->get();
    return $upit;
}
public function add($tekst,$id_film,$id_korisnik){
    $upit=\DB::table('komentar')
        ->insert([
            'tekst' => $tekst,
            'id_korisnika' => $id_korisnik,
            'id_filma' => $id_film,
            'datum' => NOW()
        ]);
    return $upit;
}
public function delete($id){
    $upit=\DB::table('komentar')
        ->where([['id','=',$id]])
        ->delete();
    return $upit;
}
public function dohvati(){
    $upit=\DB::table('komentar')
        ->select('*','komentar.id as id_komentar')
        ->join('film','film.id','=','komentar.id_filma')
        ->join('korisnik','korisnik.id','=','komentar.id_korisnika')
        ->get();
    return $upit;
}
}