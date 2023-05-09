<?php

namespace App\Http\Livewire\Assignment;

use App\Actions\Assignment\ChangeStatusOfAssignment;
use App\Enums\AssignmentStatusses;
use App\Models\Assignment;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use Livewire\Component;

class Status extends Component
{
    public Assignment $assignment;

    protected function rules()
    {
        return [
            'assignment.status' => [new Enum(AssignmentStatusses::class)]
        ];
    }

    public function render(): View
    {
        return view('livewire.assignment.status');
    }

    public function updatedAssignmentStatus($value): void
    {
        $this->validate();

        if((new ChangeStatusOfAssignment)->change($this->assignment, $value)) {
            $this->emit('addedStatus');
        }
    }
}
