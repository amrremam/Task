<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;

class PostController extends Controller
{
    use UploadImageTrait;


    public function index()
    {
        $posts = Post::get();
        $comments = Comment::get();
        $images = Image::get();
        return view('home',compact('posts','comments','images'));
    } 


    public function store(Request $request)
    {
        Post::create([
            'title'=>$request->title,
            'user'=>$request->user_id,
        ]);

        $validated = $request->validate([
            'title'=>'required|min:20 '
        ]);
        return redirect()->back();
    }


    public function show(Post $post)
    {
        $posts = Comment::findOrFail(1);
        return view('home',compact('posts'));
    }


    public function postImage(Request $request){
        $path = $this->uploadImage($request,'users');
        Image::create([
            'path'=>$path
        ]);
    }


    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('home');
    }


    public function restore($id)
    {
        Post::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }


    public function softDelete(Post $post)
    {
        $posts = Post::onlyTrashed()->get();
        return view('soft',compact('posts'));
    }


    public function forceDelete($id)
    {
        Post::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }
}
