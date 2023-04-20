<?php

namespace App\View\Components\Section;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class contactDetails extends Component
{
    public Collection $contactDetails;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->contactDetails = \App\Models\ContactDetails::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.section.contact-details');
    }
}
