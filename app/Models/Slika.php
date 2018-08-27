<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 17-Mar-18
 * Time: 22:35
 */

namespace App\Models;


class Slika
{
  public function add($putanja){
      $upit=\DB::table('slika')
          ->insertGetId(['putanja' => $putanja]);
      return $upit;
  }
  public function izbrisiSliku($putanja){
      $upit=\DB::table('slika')
          ->where([['putanja','=',$putanja]])
          ->delete();
      return $upit;
  }
}