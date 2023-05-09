<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        return view('post.index', [
            'posts' => Post::paginate(),
        ]);
    }

    public function create(): View
    {
        return view('post.create');
    }

    public function edit(Post $post): View
    {
        return view('post.edit', [
            'post' => $post,
        ]);
    }
}
