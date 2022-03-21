<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function AllArticles(Request $request){
        $tag_fillter = $request->input('tag');
        if($tag_fillter == null){
            $article = DB::table('articles');
            return view('articles',['data' => $article ->orderBy('added_at','desc')->Paginate(10) ]);
        }
        else{
            $articles_id=DB::table('article_tag')->where('tag_id', $tag_fillter)->pluck('article_id');
            
            $articles = DB::table('articles')->whereIn('id',$articles_id);
            #dd($articles_id);
            return view('articles',['data' => $articles->orderBy('added_at','desc')->Paginate(10) ]);
        }
    }


    public function ShowOneArticle($id){
        $article = Article::find($id);
        return view('one-article',['data' => $article,'tags' => $article->tags]);

    }

    public function LikesIncrease(Request $request){
        
        $article = Article::find($request->id);
        $article->likes++;
        //dd($article);
        $article->save();

        return response()->json([
            'status'=>250,
            'NewLikes' => $article->likes
        ]);

    }

    
}
