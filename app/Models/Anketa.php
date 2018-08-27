<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anketa extends Model
{
    public function dohvatiAnketu(){
        $upit=\DB::table('anketa')
            ->select('*','anketa.id as id_anketa')
            ->join('zanr','zanr.id','=','anketa.id_zanr')
            ->get();

        return $upit;

    }

    public function obrisiizankete($id){
        $upit=\DB::table('anketa')->where('id',$id)->delete();
        return $upit;
    }
}
