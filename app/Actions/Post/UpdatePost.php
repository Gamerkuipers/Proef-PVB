<?php

namespace App\Actions\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UpdatePost
{
    public function update(Post $post): bool
    {
        Gate::authorize('update', $post);

        Validator::validate($post->toArray(), [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        return DB::transaction(fn() => $post->save());
    }
}
