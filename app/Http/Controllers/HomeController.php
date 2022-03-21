<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;



class HomeController extends Controller
{
    public function FirstSix(){
        $article = new Article;
        return view('home',['data' => $article ->orderBy('added_at','desc')->take(6)->get()]);
       
    }
}
