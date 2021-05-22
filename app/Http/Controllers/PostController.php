<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function list() {
        $posts = Post::paginate(10);
        return view('posts.list',compact('posts'));
    }

    public function index() {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    public function show($id) {
        $post = Post::findorfail($id);
        return view('posts.show',compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        Post::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'age' => $request->get('age'),
            'post_text' => $request->get('post_text'),


        ]);
        return redirect()->back();
    }

    public function edit ($id){
        $post = Post::findorfail($id);
        return view('posts.edit',compact('post'));
    }

    public function update(Request $request,$id){
        $post = Post::findorfail($id);
        $post->update($request->all());
        return redirect()->back();

    }

    public function delete($id){
        $post = Post::findorfail($id);
        $post->delete();
        return redirect()->back();
    }


}
