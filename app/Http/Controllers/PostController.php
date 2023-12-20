<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostVote;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function test()
    {   
        $votePosts = Post::find('');
        return view('test.index');
    }

    public function index()
    {
        $votePosts = Post::all();
        return view('posts.index', compact('votePosts'));
    }

    public function showform()
    {
        $this->middleware('role:admin');
        return view('posts.formvote');
    }

    public function store(Request $request)
    {
        $this->middleware('role:admin');

        $request->validate([
            'title' => "required|min:4",
            'content' => "required|min:4",
            'options' => "required|array|max:5"
        ]);


        $postingan = Post::create([
            'id' => Str::random(13),
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id
        ]);

        $dataku = [];
        foreach ($request->options as $value) {
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

    public function votepost(Request $request)
    {
        // Validasi input
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'vote_id' => [
                'required',
                'exists:votes,id',
                Rule::unique('post_votes', 'vote_id')->where(function ($query) use ($request) {
                    return $query->where('user_id', auth()->id())
                        ->where('post_id', $request->post_id);
                }),
            ],
        ]);

        // Logika pemrosesan suara
        $postVote = new PostVote([
            'id' => Str::random(13),
            'user_id' => auth()->id(),
            'vote_id' => $request->vote_id,
            'post_id' => $request->post_id
        ]);
        $postVote->save();

        // Increment jumlah suara pada kandidat terkait
        $vote = Vote::find($request->vote_id);
        $vote->increment('value');

        return redirect()->back()->with('success', 'Suara Anda telah tercatat!');
    }

}
