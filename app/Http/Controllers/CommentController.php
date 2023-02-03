<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::get();
        return view('home',compact('comments'));
    }


    public function store(Request $request)
    {
        Comment::create([
            'body'=>$request->Body
        ]);

        $request->validate([
            'Body'=>'min:10'
        ]);
        return redirect()->back();
    }


    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
        //
    }


    public function update(Request $request, Comment $comment)
    {
        //
    }


    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect()->route('home');
    }
}
