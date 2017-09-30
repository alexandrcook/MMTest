<?php

namespace App\Http\Controllers;

use App\{Category,Post,Session};
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        return view('blog',
            [
                'categories' => Category::all(),
                'posts' => Post::orderBy('created_at', 'desc')->get(),
                'sessions' => Session::all()
            ]
        );
    }

}
