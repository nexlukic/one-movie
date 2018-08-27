<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 15-Mar-18
 * Time: 22:35
 */

namespace App\Http\Controllers;
use App\Models\Anketa;
use App\Models\Filmovi;
use App\Models\Korisnik;
use App\Models\Navigacija;
use App\Models\Zanr;
use Illuminate\http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Slika;
use Validator;


class Admin
{
       private $data=[];

    public function admin(){
    return view('pages.panel');
}
public function korisnici()
{
    $korisnik=new Korisnik();
    $this->data['korisnici']=$korisnik->get();
    return view('pages.korisnici',$this->data);
}
public function izbrisi_korisnika($id){
        $korisnik=new Korisnik();
        $rez=$korisnik->delete($id);
        if($rez){
            return redirect()->route('korisnici');
        }
}
public function dodaj_korisnika(Request $request){
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
    $id_uloga=$request->get('id_uloga');
    $korisnik=new Korisnik();
    try{
    $upit=$korisnik->dodaj_korisnika($username,$password,$email,$telefon,$id_uloga);

        return redirect()->route('korisnici');
    } catch(\Exeption $e){
        \Log::error('Problem sa fajlom!! ' . $e->getMessage());
    }
}
public function korisnici_izmena($id){
        $korisnik=new Korisnik();
        $this->data['korisnik']=$korisnik->dohvatiJednog($id);
        return view('pages.korisnici_izmena',$this->data);
}
public function izmeni_korisnika(Request $request){
    $rules = [
        'username' => 'min:5|max:30',
        'password' => 'min:5|max:30',
        'email' => 'email',
        'telefon' => 'alpha_num'
    ];
    $request->validate($rules);
        $id=$request->get('id');
    $username=$request->get('username');
    $password=$request->get('password');
    $email=$request->get('email');
    $telefon=$request->get('telefon');
    $id_uloga=$request->get('id_uloga');
    try{ $korisnik=new Korisnik();
    $upit=$korisnik->izmeni_korisnika($id,$username,$password,$email,$telefon,$id_uloga);
        return redirect()->route('korisnici');
    }catch(\Exeption $e){
        \Log::error('Problem sa fajlom!! ' . $e->getMessage());
    }

}
public function navigacija(){
    $navigaicja=new Navigacija();
    $this->data['navigacija']=$navigaicja->get();
    return view('pages.adminNavigacija',$this->data);
}
public function izbrisi_navigaciju($id){
        $navigacija=new Navigacija();
        $upit=$navigacija->delete($id);
        if($upit){
            return redirect()->route('navigacija');
        }
}
public function dodaj_navigaciju(Request $request){
    $rules = [
        'naziv' => 'required'
    ];
    $request->validate($rules);
        $naziv=$request->get('naziv');
        $navigacija=new Navigacija();
       try{ $upit=$navigacija->insert($naziv);
            return redirect()->route('navigacija');
       }
       catch(\Exeption $e){
               \Log::error('Problem sa fajlom!! ' . $e->getMessage());
           }


}
public function izmeni_navigaciju($id){
        $navigacija=new Navigacija();
        $this->data['nav']=$navigacija->getOne($id);
        return view('pages.navigacijaIzmeni',$this->data);

}
public function navigacija_update(Request $request){
    $rules = [
        'naziv' => 'required'
    ];
    $request->validate($rules);
        $id=$request->get('id');
        $naziv=$request->get('naziv');
        $navigacija=new Navigacija();
       try{ $upit=$navigacija->update($id,$naziv);

            return redirect()->route('navigacija');
        } catch(\Exeption $e){
           \Log::error('Problem sa fajlom!! ' . $e->getMessage());
       }
}
public function zanr(){
        $zanr=new Zanr();
        $this->data['zanr']=$zanr->get();
        return view('pages.adminZanr',$this->data);
}
public function zanrAdd(Request $request){
    $rules = [
        'naziv' => 'required'
    ];
    $request->validate($rules);
        $naziv=$request->get('naziv');
        $zanr=new Zanr();
        try{
        $upit=$zanr->add($naziv);
        if($upit){
            return redirect()->route('zanr');
        }}
        catch(\Exeption $e){
            \Log::error('Problem sa fajlom!! ' . $e->getMessage());
        }
}
public function zanrDelete($id){
        $zanr=new Zanr();
        $upit=$zanr->delete($id);
        if($upit){
            return redirect()->route('zanr');
        }
}
    public function zanrUpdate($id){
        $zanr=new Zanr();
        $this->data['zanr_one']=$zanr->getOne($id);
        return view('pages.zanrIzmeni',$this->data);
    }
    public function zanrIzmeni(Request $request){
        $rules = [
            'naziv' => 'required',
        ];
        $request->validate($rules);
        $id=$request->get('id');
        $naziv=$request->get('naziv');
        $zanr=new Zanr();
        try{
            $upit=$zanr->update($id,$naziv);
            return redirect()->route('zanr');
        }catch(\Exeption $e){
                \Log::error('Problem sa fajlom!! ' . $e->getMessage());
            }
    }
    public function dohvati(){
        $filmovi=new Filmovi();
        $this->data['zanrovi']=$filmovi->dohvatiZanrove();
        $this->data['filmovi']=$filmovi->dohvatiAdmin(2);
        return view('pages.filmovi',$this->data);
    }
    public function filmAdd(Request $request)
    {
        $rules = [
            'naziv' => 'required',
            'link' => 'required',
            'slika' => 'required|mimes:jpg,jpeg,png,gif',
            'id_zanr' => 'required'
        ];
        $request->validate($rules);
        $slika = $request->file('slika');
        $extension = $slika->getClientOriginalExtension();
        $folder = 'images/';
        $file_name = time() . "." . $extension;
        $new_path = public_path($folder);
        try {
    

            //File::move($tmp_path, $new_path);
            $slika->move($new_path,$file_name);
          

            $slika = new Slika();
             $id = $slika->add($file_name);
             if($id){
                 $naziv=$request->get('naziv');
                 $link=$request->get('link');
                 $id_slika=$id;
                 $iz_zanr=$request->get('id_zanr');
                 $film=new Filmovi();
                 $upit=$film->filmAdd($naziv,$link,$id_slika,$iz_zanr);
                 if($upit){
                     return redirect()->route('filmovi');
                 }
             }

        } catch (\Symfony\Component\HttpFoundation\File\Exception\FileException $ex) { // greske sa fajlom
            \Log::error('Problem sa fajlom!! ' . $ex->getMessage());
            return redirect()->back()->with('error', 'Greska pri dodavanju slike!');
        }
        catch(\Illuminate\Database\QueryException $ex){
            \Log::error($ex->getMessage());
            return redirect()->back()->with('error','Greska pri dodavanju posta u bazu!');
        }
    }
    public function filmDelete($id){
        $film=new Filmovi();
        $slika=$film->dohvatiPutanju($id);
        $putanja=$slika->putanja;
        $image_path = public_path("images/$putanja");
            File::delete($image_path);
            $upit=$film->filmDelete($id);
            if($upit){
               return redirect()->route('filmovi');
            }
        else{
            echo "nista";
        }
    }
    public function filmUpdate($id){
        $zanr=new Zanr();
        $film=new Filmovi();
        $this->data['film']=$film->getOne($id);
        $this->data['zanrovi']=$zanr->get();
        return view('pages.filmoviIzmeni',$this->data);
    }
    public function filmIzmeni(Request $request)
    {
        $slika = $request->file('slika');
        if ($slika != "") {
            $tmp_path = $slika->getPathName();
            $extension = $slika->getClientOriginalExtension();
            $trenutna = $request->get('trenutna');
            $image_path = public_path("images/$trenutna");
            File::delete($image_path);
            $folder = 'images/';
            $file_name = time() . "." . $extension;
            $new_path = public_path($folder);
        
           //File::move($tmp_path, $new_path);
           $slika->move($new_path,$file_name);

            $slika = new Slika();
            $izbrisi=$slika->izbrisiSliku($trenutna);
            if($izbrisi) {
                $id = $slika->add($file_name);
                if ($id) {
                    $id_filma = $request->get('id_filma');
                    $naziv = $request->get('naziv');
                    $link = $request->get('link');
                    $id_slika = $id;
                    $id_zanr = $request->get('id_zanr');
                    $film = new Filmovi();
                    $upit = $film->filmUpdate($id_filma, $naziv, $link, $id_slika, $id_zanr);
                    if ($upit) {
                        return redirect()->route('filmovi');
                    }
                }
            }

        }else{
            $id_filma = $request->get('id_filma');
            $naziv = $request->get('naziv');
            $link = $request->get('link');
            $id_zanr = $request->get('id_zanr');
            $film = new Filmovi();
            $upit = $film->filmIzmeni2($id_filma, $naziv, $link,$id_zanr);
            if($upit){
                return redirect()->route('filmovi');
            }

        }
    }

    public function anketa(){
        $anketa=new Anketa();
        $podaci=$anketa->dohvatiAnketu();
        return view('pages.anketa', compact('podaci'));
    }
    public function anketadelete($id){
        $anketa=new Anketa();
        $anketa->obrisiizankete($id);
        return back();
    }

}