<?php

namespace App\Actions\Assignment;

use App\Models\Assigned;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DeleteStudentFromAssignment
{
    public function delete(Assigned $assigned): bool
    {
        Gate::authorize('deleteStudent', $assigned->assignment);

        return DB::transaction(fn() => $assigned->delete());
    }
}
