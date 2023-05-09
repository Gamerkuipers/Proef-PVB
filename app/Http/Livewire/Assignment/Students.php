<?php

namespace App\Http\Livewire\Assignment;

use App\Actions\Assignment\AddStudentToAssignment;
use App\Actions\Assignment\DeleteStudentFromAssignment;
use App\Http\Livewire\Traits\WithAlerts;
use App\Models\Assigned;
use App\Models\Assignment;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\MessageBag;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination,
        WithAlerts;

    public Assignment $assignment;

    public Carbon $minStartDate;

    public string $student = '';

    public string $start_date = '';
    public string $end_date = '';

    protected function rules(): array
    {
        return [
            'student' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date', 'after:' . $this->minStartDate],
            'end_date' => ['date', 'after:start_date', 'before:' . $this->maxEndDate],
        ];
    }

    public function render(): View
    {
        return view('livewire.assignment.students', [
            'assigneds' => $this->assignment->assigneds()->orderByDesc('created_at')->paginate(5)
        ]);
    }

    public function mount(): void
    {
        $this->setDates();
    }

    protected function setDates(): void
    {
        $this->minStartDate = Carbon::yesterday();

        $this->start_date = $this->formatDate(Carbon::now());

        $this->end_date = $this->formatDate(Carbon::now()->addWeeks(10));
    }

    public function formatDate(Carbon $date)
    {
        return $date->format('Y-m-d');
    }

    public function getMaxEndDateProperty(): string
    {
        return $this->formatDate(Carbon::create($this->start_date)->addWeeks(10)->addDay());
    }

    public function getMinStartDate(): string
    {
        return $this->formatDate($this->minStartDate);
    }

    public function addStudent(AddStudentToAssignment $adder): MessageBag|null
    {
        $this->validate();

        if ($adder->addStudent(
            $this->assignment,
            $this->student,
            $this->start_date,
            $this->end_date
        )) {
            $this->alertSuccess(__('added student: :name', ['name' => $this->student]));

            $this->reset([
                'student',
            ]);

            $this->setDates();

            return null;
        }
        $this->alertError(__('Something went wrong. Try again later'));
        return $this->addError('general', __('Something went wrong. Try again later'));
    }

    public function deleteStudent(DeleteStudentFromAssignment $deletor, Assigned $assigned)
    {
        try {
            $deletor->delete($assigned);
            //show success
        } catch(Exception $exception) {
            // show error
        }
    }
}
