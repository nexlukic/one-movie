<?php
/**
 * Created by PhpStorm.
 * User: Nex
 * Date: 26.2.2018.
 * Time: 23.19
 */

namespace App\Http\Controllers;


use App\Models\Meni;
use App\Models\Filmovi;
use App\Models\Korisnik;
use App\Models\About;
use App\Models\Komentar;
use App\Models\Anketa;
use App\Models\Zanr;
use Illuminate\http\Request;

class FrontController
{
    private $data;

    public function __construct()
    {
        $meni=new Meni();
        $this->data['meni'] = $meni->getAll();
        $about=new About();
        $this->data['about']=$about->get();

    }
    public function home(){
        $film=new Filmovi();
        $zanr=new Filmovi();
        $this->data['zanrovi']=$zanr->dohvatiZanrove();
        $this->data['filmovi']=$film->dohvatiSve(2);
        return view('pages.home',$this->data);
    }
    public function list(){
        return view('pages.list',$this->data);
    }
    public function sortiraj($slovo){
        echo $slovo;
        $sortirani=new Filmovi();
        $niz=$sortirani->sortiraj($slovo);
        return $niz;
    }
    public function about(){
        $zanr=new Zanr();
        $zanrovi=$zanr->get();

          return view('pages.about',$this->data, compact('zanrovi'));
    }
    public function single($id){
        $komentar=new Komentar();
        $this->data['komentari']=$komentar->dohvatisve($id);
        $film=new Filmovi();
        $this->data['jedan']=$film->dohvatiJedan($id);
        return view('pages.single',$this->data);
    }
    public function sortirajZanr($zanr){
        $filmovi=new Filmovi();
        $upit=$filmovi->sortirajZanr($zanr);
        return $upit;
    }
    public function login(Request $request){
     $username=$request->get('username');
        $password=$request->get('password');
        $korisnik=new Korisnik();
        $upit=$korisnik->login($username,$password);

        if($upit){
            session()->put('user',$upit);
            return redirect()->route('HOME');
        }
        else{
            return redirect()->route('HOME');
        }
    }
    public function register(Request $request){
        $rules = [
            'username' => 'min:5|max:30',
            'password' => 'min:5|max:30',
            'email' => 'email',
            'telefon' => 'alpha_num'
        ];
        $request->validate($rules);
       $username=$request->get('username');
        $password=$request->get('password');
        $email=$request->get('email');
        $telefon=$request->get('telefon');
        $korisnik=new Korisnik();
       try {
           $upit = $korisnik->registruj($username, $password, $email, $telefon);
           return redirect()->back();
        }catch(\Exeption $e){
             \Log::error('Problem sa fajlom!! ' . $e->getMessage());
       }

    }
    public function logout(){
        session()->flush();
        return redirect()->route('HOME');
    }
    public function brojpregleda($id){
        $film=new Filmovi();
        return $film->uvecaj($id);
    }
    public function dodajKomentar(Request $request){
        $id_korisnik=$request->get('id_korisnik');
        $id_film=$request->get('id_film');
        $tekst=$request->get('tekst');
        $komentar=new Komentar();
        $upit=$komentar->add($tekst,$id_film,$id_korisnik);
        if($upit){
            return redirect()->back();
        }
    }
    public function obrisiKomentar($id){
    $komentar=new Komentar();
    $upit=$komentar->delete($id);
    if($upit){
        return redirect()->back();
    }
    }
    public function komentari(){
        $komentar=new Komentar();
        $this->data['komentari_admin']=$komentar->dohvati();
        return view('pages.komentari',$this->data);
    }

    public function anketa(Request $request){


       $userid= $request->session()->get('user')->id_korisnik;
       $zanrid=$request->zanrid; 
       
       $provera=\DB::table('anketa')->where('id_user',$userid)->get()->count();
       
       if($provera == 1){
           return 1;
       }
       else if($provera == 0){
           try{
               \DB::table('anketa')->insert([
                   'id_zanr' => $zanrid,
                    'id_user'=> $userid,
                   ]);

              return 2;
           }catch (\Exception $ex){
               \Log::error('greska prilikom koriscenja ankete' . $ex.getMessage());
               return 0;
           }
       }
       else {return 1;}



    }
}