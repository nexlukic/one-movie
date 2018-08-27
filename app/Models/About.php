<?php
/**
 * Created by PhpStorm.
 * User: Nex
 * Date: 27.2.2018.
 * Time: 17.29
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;

class About
{
 public function get(){
     return DB::table('about')->get()->first();
 }
}