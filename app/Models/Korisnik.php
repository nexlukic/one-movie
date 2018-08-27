<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 15-Mar-18
 * Time: 21:34
 */

namespace App\Models;


class Korisnik
{

    protected $table="korisnik"; //veza sa tabelom korisnik

public function login($username,$password){
  $upit=\DB::table('korisnik')
       ->select('*','korisnik.id as id_korisnik')
      ->join('uloga','uloga.id','=','korisnik.id_uloga')
      ->where([['username','=',$username],['password','=',$password]])
      ->get()
      ->first();
  return $upit;
}
public function  registruj($username,$password,$email,$telefon){
    $upit=\DB::table('korisnik')
        ->insert(['username' => $username,'password' => $password,'email' => $email,'telefon' => $telefon,'id_uloga' => 2]);
    return $upit;
}
public function get(){
    $upit=\DB::table('korisnik')
        ->select('*','korisnik.id as id_korisnik')
        ->join('uloga','uloga.id','=','korisnik.id_uloga')
        ->get();
    return $upit;
}
public function delete($id){
    $upit=\DB::table('korisnik')
        ->where([['id','=',$id]])
        ->delete();
    return $upit;
}
    public function dodaj_korisnika($username,$password,$email,$telefon,$id_uloga){
        $upit=\DB::table('korisnik')
            ->insert(['username' => $username,'password' => $password,'email' => $email,'telefon' => $telefon,'id_uloga' => $id_uloga]);
        return $upit;

    }
    public function dohvatiJednog($id){
    $upit=\DB::table('korisnik')
        ->select('*','korisnik.id as id_korisnik')
        ->join('uloga','uloga.id','=','korisnik.id_uloga')
        ->where([['korisnik.id','=',$id]])->get()->first();
    return $upit;
    }
    public function izmeni_korisnika($id,$username,$password,$email,$telefon,$id_uloga){
    $upit=\DB::table('korisnik')
        ->where([['id','=',$id]])
        ->update([
           'username' => $username,
           'password' => $password,
            'email' => $email,
            'telefon' => $telefon,
            'id_uloga' => $id_uloga
        ]);
    return $upit;
    }
}