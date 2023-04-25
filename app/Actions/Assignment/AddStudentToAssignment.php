<?php

namespace App\Actions\Assignment;

use App\Models\Assignment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class AddStudentToAssignment
{
    public function addStudent(Assignment $assignment, string $student, $startDate, $endDate): bool
    {
        Gate::authorize('addStudent', $assignment);

        $validated = Validator::validate([
            'student' => $student,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ], [
            'student' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date', 'after:' . Carbon::yesterday()],
            'end_date' => ['date', 'after:newStartDate', 'before:' . Carbon::create($startDate)->addWeeks(10)->addDay()],
        ]);

        return (bool) DB::transaction(fn() => $assignment->assigneds()->create($validated));
    }
}
