<?php

namespace App\Actions\Assignment;

use App\Models\Assignment;
use App\Models\AssignmentLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ChangeStatusOfAssignment
{
    public function change(Assignment $assignment, string $status): bool
    {
        Gate::authorize('update', Assignment::class);

        if($assignment->isClean('status')) return true;

        $oldStatus = $assignment->getOriginal('status');
        $assignment->status = $status;

        return DB::transaction(function() use ($assignment, $oldStatus){
            $assignment->save();
            $assignment->logs()->create([
                'old_status' => $oldStatus,
                'new_status' => $assignment->status,
            ]);

            return true;
        });
    }
}
