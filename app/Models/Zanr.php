<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 17-Mar-18
 * Time: 20:55
 */

namespace App\Models;


class Zanr
{


public function get(){
    $upit=\DB::table('zanr')
        ->get();
    return $upit;
}
    public function getOne($id){
        $upit=\DB::table('zanr')
            ->where([['id','=',$id]])
            ->get();
        return $upit;
    }
    public function delete($id){
        $upit=\DB::table('zanr')
            ->where([['id','=',$id]])
            ->delete();
        return $upit;
    }
    public function update($id,$naziv){
        $upit=\DB::table('zanr')
            ->where([['id','=',$id]])
            ->update(['naziv' => $naziv]);
        return $upit;
    }
    public function add($naziv){
        $upit=\DB::table('zanr')
            ->insert(['naziv' => $naziv]);
        return $upit;
    }
}