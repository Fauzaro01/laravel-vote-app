<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class RootController extends Controller
{
    public function root()
    {
        return view('index');
    }

    public function showvote($id)
    {
        // Lakukan sesuatu dengan nilai $id, misalnya ambil data dari database
        $data = Post::find($id);
        $vote = $data->votes;

        // Tampilkan data atau lakukan tindakan lain
        return view('posts.postingan', ['data' => $data, 'votes' => $vote]);
    }
}
