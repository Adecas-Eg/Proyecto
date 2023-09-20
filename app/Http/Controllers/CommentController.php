<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function index()
    {

        $user = User::find(auth()->user()->id);

        $comments = $user->comment;


    }
    public function create()
    {

        $user = User::find(auth()->user()->id);

        $comments = $user->comment;
        if (!empty($comments)) {
            return view('casas.show', compact('casa', 'comments', 'user'));

        }

    }
    public function store(Request $request, $id)
    {

        $new = $request->validate(['comment' => 'required']);
        $comment = Comment::create($new);
        $comment->user_id = auth()->user()->id;
        $comment->casa_id = $id;
        $comment->created = now();

        $comment->save();
        return redirect()->back();
    }


    public function update( Comment $comment,Request $request)
    {
        
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->back();

    }

    public function destroy(Comment $comment){

        $comment->delete();
        return redirect()->back();
    }
}