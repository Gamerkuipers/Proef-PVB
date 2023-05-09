<?php

namespace App\Http\Livewire\Assignment;

use App\Models\Assignment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Logs extends Component
{
    use WithPagination;

    public Assignment $assignment;

    protected $listeners = [
        'addedStatus',
    ];

    public function render(): View
    {
        return view('livewire.assignment.logs', [
            'logs' => $this->assignment->logs()->orderByDesc('created_at')->paginate(5),
        ]);
    }

    public function addedStatus(): void
    {
        $this->resetPage();
    }
}
