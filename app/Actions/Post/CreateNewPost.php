<?php

namespace App\Actions\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CreateNewPost
{
    public function create(string $title, string $body): Post|bool
    {
        $validated = Validator::validate([
            'title' => $title,
            'body' => $body,
        ], [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255'],
        ]);

        return DB::transaction(fn() => Post::create($validated));
    }
}
