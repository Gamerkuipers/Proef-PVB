<?php

namespace App\Http\Livewire\Post;

use App\Actions\Post\UpdatePost;
use App\Http\Livewire\Traits\WithAlerts;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class Edit extends Component
{
    use WithAlerts;

    public Post $post;

    protected $rules = [
        'post.title' => ['required', 'string', 'max:255'],
        'post.body' => ['required', 'string'],
    ];

    public function render(): View
    {
        return view('livewire.post.edit');
    }

    public function save(UpdatePost $updater): Redirector|RedirectResponse|null
    {
        $this->validate();

        if ($updater->update($this->post)) {
            return $this->flashSuccess(route('dashboard.post.show', $this->post), 'Updated post');
        };

        $this->alertError(__('Something went wrong, try again later.'));

        return null;
    }
}
