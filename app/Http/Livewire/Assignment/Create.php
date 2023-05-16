<?php

namespace App\Http\Livewire\Assignment;

use App\Actions\Assignment\CreateAssignment;
use App\Http\Livewire\Traits\WithAlerts;
use App\Models\Assignment;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads,
        WithAlerts;

    public Assignment $assignment;

    public $deadline = '';

    public $images = [];

    protected $rules = [
        'assignment.name' => ['required', 'string', 'max:255'],
        'assignment.target_audience' => ['required', 'string', 'max:255'],
        'assignment.description' => ['required', 'string'],
        'deadline' => ['required', 'date'],
        'assignment.deadline' => ['required', 'date'],
        'assignment.company_name' => ['required', 'string', 'max:255'],
        'assignment.company_description' => ['required', 'string'],
        'assignment.email' => ['required', 'email'],
        'assignment.phone_numbers.*' => ['required', 'string', 'max:255'],
        'assignment.examples.*' => ['string'],
        'images.*' => ['image', 'max:2048']
    ];

    public function render(): View
    {
        return view('livewire.assignment.create');
    }

    public function updatedImages()
    {
        $this->validateOnly('images');
    }

    public function updatedDeadline()
    {
        $this->assignment->deadline = $this->deadline;

        $this->validateOnly('deadline');
    }

    public function mount(): void
    {
        $this->resetAssignment();
    }

    private function resetAssignment(): void
    {
        $this->assignment = Assignment::make();
        $this->reset(['images', 'deadline']);
    }

    public function save(CreateAssignment $creator)
    {
        $this->validate();

        if($creator->create($this->assignment)) {

            foreach($this->images as $image) {
                $image->store("public/{$this->assignment->id}");
            }

            $this->alertSuccess(__('Assignment received'));
            $this->resetAssignment();

            return;
        };

        $this->addError('general', __('Something went wrong, try again later.'));
        $this->alertError(__('Something went wrong, try again later.'));
    }
}
