<?php

namespace App\Http\Livewire\Assignment;

use App\Actions\Assignment\CreateAssignment;
use App\Enums\AssignmentStatusses;
use App\Models\Assignment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public Assignment $assignment;

    protected $rules = [
        'assignment.name' => ['required', 'string', 'max:255'],
        'assignment.target_audience' => ['required', 'string', 'max:255'],
        'assignment.description' => ['required', 'string'],
        'assignment.deadline' => ['required', 'string', 'date'],
        'assignment.company_name' => ['required', 'string', 'max:255'],
        'assignment.company_description' => ['required', 'string'],
        'assignment.email' => ['required', 'email'],
        'assignment.phone_numbers.*' => ['required', 'string', 'max:255'],
    ];

    public function render(): View
    {
        return view('livewire.assignment.create');
    }

    public function mount(): void
    {
        $this->resetAssignment();
    }

    private function resetAssignment(): void
    {
        $this->assignment = Assignment::make();
    }

    public function save(CreateAssignment $creator)
    {
        $this->validate();

        if($creator->create($this->assignment)) {
            // do an alert

            $this->resetAssignment();
        };

        $this->addError('general', __('Something went wrong. Try again later.'));
    }
}
