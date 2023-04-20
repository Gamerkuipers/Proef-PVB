<?php

namespace App\Actions\ContactDetails;

use App\Models\ContactDetails;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UpdateContactDetails
{
    public function update(ContactDetails $contactDetail): bool
    {
        $this->authorize($contactDetail);

        Validator::make($contactDetail->getDirty(), [
            'name' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
        ])->validateWithBag('contactDetails');

        return DB::transaction(fn() => $contactDetail->save());
    }

    public function updateMany(Collection $contactDetails): bool
    {
        $this->authorize($contactDetails->first());

        Validator::make($contactDetails->toArray(), [
            '*.name' => ['required', 'string', 'max:255'],
            '*.content' => ['required', 'string', 'max:255']
        ])->validateWithBag('contactDetails');

        return (bool)DB::transaction(fn() => $contactDetails->each->save());
    }

    private function authorize(ContactDetails $contactDetail): void
    {
        Gate::authorize('update', $contactDetail);
    }
}
