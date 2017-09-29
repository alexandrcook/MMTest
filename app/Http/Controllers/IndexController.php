<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('blog',
            [
                'categories' => Category::all(),
                'posts' => Post::orderBy('created_at', 'desc')->get()
            ]
        );
    }

}
