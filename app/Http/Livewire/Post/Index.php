<?php

namespace App\Http\Livewire\Post;

use App\Actions\Post\CreateNewPost;
use App\Http\Livewire\Traits\WithAlerts;
use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination,
        WithAlerts;

    public string $title = '';

    public string $body = '';

    public Post $deletingPost;

    protected $rules = [
        'title' => ['required', 'string', 'max:255'],
        'body' => ['required', 'string'],
    ];

    protected $listeners = [
        'deletePost'
    ];

    public function render(): View
    {
        return view('livewire.post.index', [
            'posts' => Post::orderByDesc('created_at')->paginate(10),
        ]);
    }

    public function createPost(CreateNewPost $creator): void
    {
        $this->validate();

        if ($creator->create($this->title, $this->body)) {
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

    public function confirmDeletion(Post $post): void
    {
        $this->deletingPost = $post;

        $this->alert('warning', 'Are you sure you want to delete post: "' . $post->title . '"', [
            'position' => 'center',
            'timer' => null,
            'showDenyButton' => true,
            'denyButtonText' => 'Delete',
            'showCancelButton' => true,
            'onDenied' => 'deletePost',
            'onDismissed' => 'cancelled'
        ]);
    }

    public function deletePost(): void
    {
        $this->deletingPost->delete();
        $this->alertSuccess('Deleted post: ' . $this->deletingPost->title);
    }
}
