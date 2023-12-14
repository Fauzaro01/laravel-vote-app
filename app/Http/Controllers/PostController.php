<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function test() {
        return "Hello World 200!";
    }

    public function index() {
        $votePosts = Post::all();
        return view('posts.index', compact('votePosts'));
    }

    public function showform() {
        $this->middleware('role:admin');
        return view('posts.formvote');
    }

    public function store(Request $request) {
        $this->middleware('role:admin');
        
        $request->validate([
            'title' => "required|min:4",
            'content' => "required|min:4",
            'options' => "required|array|max:5"
        ]);

    
        $postingan = Post::create([
            'id' => Str::random(13),
            'title' => $request->title,
            'content'=> $request->content,
            'user_id'=> Auth::user()->id
        ]); 

        $dataku = [];
        foreach($request->options as $value) {
            $dataku[] = [
                'id' => Str::random(13),
                'name' => $value,
                'value' => 0,
                'post_id' => $postingan->getAttribute('id')

            ];
        }

        $postingan->votes()->createMany($dataku);

        return response()->json(["msg" => "Berhasil Bro :D"]);

    }

}
