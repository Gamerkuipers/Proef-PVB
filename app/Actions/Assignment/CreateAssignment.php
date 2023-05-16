<?php

namespace App\Actions\Assignment;

use App\Enums\AssignmentStatusses;
use App\Models\Assignment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CreateAssignment
{
    public function create(Assignment $assignment): bool
    {
        Validator::make($assignment->getDirty(), [
            'name' => ['required', 'string', 'max:255'],
            'target_audience' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'deadline' => ['required', 'date'],
            'company_name' => ['required', 'string', 'max:255'],
            'company_description' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'phone_numbers.*' => ['string', 'max:255'],
        ])->validateWithBag('assignment');

        $assignment->status = AssignmentStatusses::OPEN->value;

        return DB::transaction(fn() => $assignment->save());
    }
}
