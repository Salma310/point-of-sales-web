<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Menampilkan Halaman Home dari view home
    public function home(){
        return view('home');
    }
       
}
