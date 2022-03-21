<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/articles', function () {
    return view('articles');
});



use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentsController;

Route::get('/',[HomeController::class, 'FirstSix']);

Route::get('/articles',[ArticlesController::class,'AllArticles']); 

Route::get('/articles/{id}',[ArticlesController::class,'ShowOneArticle']) -> name('OneArticle');

Route::post('/articles/{id}',[ArticlesController::class,'LikesIncrease']);

Route::post('/articles/{id}/submit',[CommentsController::class,'SumbitComment']);



//$Articles = \App\Models\Article::all();

//foreach($Articles as $Article){
//    echo $Article['article_name'].'<br>';
//    foreach($Article->tags as $tag){
//        echo $tag['tag_name'].'<br>';
//  }
//    echo '-----------------<br>';
//}