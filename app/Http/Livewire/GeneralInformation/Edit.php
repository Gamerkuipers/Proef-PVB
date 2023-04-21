<?php

namespace App\Http\Livewire\GeneralInformation;

use App\Actions\GeneralInformation\UpdateGeneralInformation;
use App\Models\WebContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\MessageBag;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class Edit extends Component
{
    public WebContent $generalInformation;

    protected $rules = [
        'generalInformation.name' => ['string', 'max:255'],
        'generalInformation.body' => ['string'],
    ];

    public function mount(): void
    {
        $this->generalInformation = WebContent::firstOrCreate(['key' => 'general_information']);
    }

    public function render(): View
    {
        return view('livewire.general-information.edit');
    }

    public function save(UpdateGeneralInformation $updater): RedirectResponse|Redirector|MessageBag
    {
        $this->validate();

        if($updater->update($this->generalInformation)) {
            return to_route('generalInformation.index');
        };

        return $this->addError('general', __('Something went wrong. Try again later.'));
    }
}