<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the home page
     */
    public function index(): View
    {
        return view('home', [
            'posts' => Post::orderByDesc('created_at')->limit(4)->get()
        ]);
    }
}
