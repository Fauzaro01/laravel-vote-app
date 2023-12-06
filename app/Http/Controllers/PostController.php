<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function test(Request $request)
    {
        // Menampilkan semua data yang dikirim dari client
        $allData = $request->all();

        return response()->json(['data' => $allData]);
    }

    public function index() {

        return  view('posts.index');
    }

    public function showform() {
        $this->middleware('auth');
        $this->middleware('role:admin');
        return view('posts.formvote');
    }

    public function store(Request $request) {
        $this->middleware('auth');
        $this->middleware('role:admin');
        
        $request->validate([
            'title' => "required|min:4",
            'content' => "required|min:4",
            'options' => "required|array"
        ]);
        
        $post_id = Str::random(13);
        $dataku = [];
        foreach($request->options as $value) {
            $dataku[] = [
                'id' => Str::random(13),
                'name' => $value,
                'value' => 0,
                'post_id' => $post_id
            ];
        }

        $postingan = Post::create([
            'id' => $post_id,
            'title' => $request->title,
            'content'=> $request->content,
            'user_id'=> Auth::user()->id
        ]);

        $postingan->votes()->createMany($dataku);

        return response($dataku);

    }

}
