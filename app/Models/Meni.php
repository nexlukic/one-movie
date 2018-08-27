<?php
/**
 * Created by PhpStorm.
 * User: Nex
 * Date: 27.2.2018.
 * Time: 01.32
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;



class Meni
{
public function getAll(){
    $rezultat= DB ::table('navigacija')->get();
    return $rezultat;
}
}