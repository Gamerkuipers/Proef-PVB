<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Http\RedirectResponse;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Redirector;

trait WithAlerts
{
    use LivewireAlert;

    public function alertSuccess(string $message): void
    {
        $this->alert('success', $message);
    }

    public function alertError(string $message): void
    {
        $this->alert('error', $message);
    }

    public function flashSuccess(string $route, string $message): RedirectResponse|Redirector
    {
        return $this->flash('success', $message, [], $route);
    }
}
