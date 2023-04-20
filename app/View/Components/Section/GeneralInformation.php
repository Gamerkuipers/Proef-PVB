<?php

namespace App\View\Components\Section;

use App\Models\WebContent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GeneralInformation extends Component
{
    public string $name = '';
    public string $content = '';

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $generalInformation = WebContent::firstOrCreate(['key' => 'general_information']);

        $this->name = $generalInformation->name;
        $this->content = $generalInformation->body;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.section.general-information');
    }
}
