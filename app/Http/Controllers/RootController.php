<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RootController extends Controller
{
    public function root() {
        return view('index');
    }

    public function showvote () {
        return "200";
    }
}
