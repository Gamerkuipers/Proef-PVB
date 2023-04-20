<?php

namespace App\Http\Livewire\ContactDetails;

use App\Actions\ContactDetails\UpdateContactDetails;
use App\Models\ContactDetails;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\MessageBag;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class Edit extends Component
{
    public Collection $contactDetails;

    protected $rules = [
        'contactDetails.*.name' => ['required', 'string', 'max:255'],
        'contactDetails.*.content' => ['required', 'string', 'max:255'],
    ];

    public function render(): View
    {
        return view('livewire.contact-details.edit');
    }

    public function mount(): void
    {
        $this->contactDetails = ContactDetails::all();
    }

    public function save(UpdateContactDetails $updater): Redirector|RedirectResponse|MessageBag
    {
        $this->validate();

        if($updater->updateMany($this->contactDetails))
        {
            return to_route('contactDetails.index');
        }

        return $this->addError('general', __('Something went wrong. Try again later.'));
    }
}
