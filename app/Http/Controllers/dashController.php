<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class dashController extends Controller
{


    public function index()
    {
        $posts = Auth::user()->posts;
        return view('dashboard', compact('posts'));
    }

}
