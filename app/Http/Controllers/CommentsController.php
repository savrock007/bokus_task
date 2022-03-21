<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller{



    public function SumbitComment(Request $request){ 

        $validator =Validator::make($request->all(),[
            'subject' => 'required|max:191',
            'comment_text' => 'required|max:191',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        else
        {
            $comment = new Comment;
            $comment->article_id = $request->id;
            $comment->subject = $request->subject;
            $comment->comment_text = $request->comment_text;
            $comment->save();
            return response()->json([
                'status' => 200,
                'message' => 'Комментарий добавлен успешно',
            ]);
        }

        

      
  }

}
