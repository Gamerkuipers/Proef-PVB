<?php

namespace App\Http\Livewire\Post;

use App\Actions\Post\CreateNewPost;
use App\Http\Livewire\Traits\WithAlerts;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination,
        WithAlerts;

    public string $title = '';

    public string $body = '';

    protected $rules = [
        'title' => ['required', 'string', 'max:255'],
        'body' => ['required', 'string'],
    ];

    public function render(): View
    {
        return view('livewire.post.index', [
            'posts' => Post::orderByDesc('created_at')->paginate(),
        ]);
    }

    public function createPost(CreateNewPost $creator): void
    {
        $this->validate();

        if($creator->create($this->title, $this->body)) {
            $this->alertSuccess('Created Post');

            $this->reset([
                'title',
                'body'
            ]);

            $this->resetPage();

            return;
        }

        $this->alertError('Something went wrong, try again later.');
    }
}
