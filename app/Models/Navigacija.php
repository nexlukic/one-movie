<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 17-Mar-18
 * Time: 20:24
 */

namespace App\Models;


class Navigacija
{
    public function get(){
        $upit=\DB::table('navigacija')->get();
        return $upit;
    }
    public function delete($id){
        $upit=\DB::table('navigacija')
            ->where([['id','=',$id]])
            ->delete();
        return $upit;
    }
    public function insert($naziv){
        $upit=\DB::table('navigacija')
            ->insert(['naziv' => $naziv]);
        return $upit;
    }
    public function getOne($id){
        $upit=\DB::table('navigacija')
            ->where([['id','=',$id]])
            ->get()
            ->first();
        return $upit;
    }
    public function update($id,$naziv){
        $upit=\DB::table('navigacija')
            ->where([['id','=',$id]])
            ->update(['naziv' => $naziv]);
        return $upit;
    }

}