<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 15-Mar-18
 * Time: 18:06
 */

namespace App\Models;


class Filmovi
{
    public function dohvatiSve($broj){
        $upit=\DB::table('film')
            ->select('*','slika.id as id_slika')
            ->select('*','film.id as id')
            ->join('slika','slika.id','=','film.id_slika')
            ->paginate($broj);
        return $upit;
    }
    public function dohvatiJedan($id){
        $upit=\DB::table('film')
            ->select('*','film.id as id_f')
            ->join('slika','slika.id','=','film.id_slika')
            ->where('film.id','=',$id)
            ->get()->first();
        return $upit;
    }
    public function lista($naziv='P'){
        $upit=\DB::table('film')
            ->join('slika','slika.id','=','film.id_slika')
            ->where('naziv','like', $naziv.'%')
            ->get();
        return $upit;
    }
    public function sortiraj($slovo){
        $upit=\DB::table('film')
            ->select('*','film.naziv as ime','film.id as id_filma')
            ->join('slika','slika.id','=','film.id_slika')
            ->join('zanr','zanr.id','=','film.id_zanr')
            ->where('film.naziv','like', $slovo.'%')
            ->get();
        return $upit;
    }
    public function dohvatiZanrove(){
        return \DB::table('zanr')->get();
    }
    public function sortirajZanr($zanr){
        $upit=\DB::table('film')
            ->select('*','film.naziv as ime','film.id as id_filma')
            ->join('slika','slika.id','=','film.id_slika')
            ->join('zanr','zanr.id','=','film.id_zanr')
            ->where([['zanr.naziv','=',$zanr]])
            ->get();
        return $upit;
    }
    public function dohvatiAdmin($broj){
        $upit=\DB::table('film')
            ->select('*','film.naziv as ime','film.id as id_filma')
            ->join('slika','slika.id','=','film.id_slika')
            ->join('zanr','zanr.id','=','film.id_zanr')
            ->paginate($broj);
        return $upit;

    }
    public function filmAdd($naziv,$link,$id_slika,$id_zanr){
        $upit=\DB::table('film')
            ->insert(['naziv' => $naziv,'link' => $link,'id_slika' => $id_slika,'id_zanr' =>
        $id_zanr,'datum_dodavanja' => NOW(),'datum_izmene' => NOW()]);
        return $upit;
    }
    public function dohvatiPutanju($id){
        $upit=\DB::table('film')
            ->join('slika','slika.id','=','film.id_slika')
            ->where([['film.id','=',$id]])
            ->get()->first();
        return $upit;

    }
    public function filmDelete($id){
        $upit=\DB::table('film')
            ->where([['id','=',$id]])
            ->delete();
        return $upit;
    }
    public function getOne($id){
        $upit=\DB::table('film')
            ->select('*','film.naziv as ime','film.id as id_filma')
            ->join('slika','slika.id','=','film.id_slika')
            ->join('zanr','zanr.id','=','film.id_zanr')
            ->where([['film.id','=',$id]])
            ->get()
            ->first();
        return $upit;

    }
    public function filmUpdate($id_filma,$naziv,$link,$id_slika,$id_zanr){
        $upit=\DB::table('film')
            ->where([['film.id','=',$id_filma]])
            ->update([
                'naziv' => $naziv,
                'link' => $link,
                'id_slika' => $id_slika,
                'id_zanr' => $id_zanr
            ]);
        return $upit;
    }
    public function filmIzmeni2($id_filma,$naziv,$link,$id_zanr){
        $upit=\DB::table('film')
            ->where([['film.id','=',$id_filma]])
            ->update([
                'naziv' => $naziv,
                'link' => $link,
                'id_zanr' => $id_zanr
            ]);
        return $upit;

    }
}