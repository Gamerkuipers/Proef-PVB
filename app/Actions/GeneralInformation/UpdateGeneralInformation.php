<?php

namespace App\Actions\GeneralInformation;

use App\Models\WebContent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UpdateGeneralInformation
{
    /**
     * Validate User and data and update general information
     */
    public function update(WebContent $generalInformation): bool
    {
        Gate::authorize('update', WebContent::class);

        Validator::make($generalInformation->getDirty(), [
            'name' => ['string', 'max:255'],
            'body' => ['string']
        ])->validateWithBag('generalInformation');


        return DB::transaction(fn() => $generalInformation->save());
    }
}
