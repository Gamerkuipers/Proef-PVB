<?php

namespace Tests\Feature\Livewire\ContactDetails;

use App\Http\Livewire\ContactDetails\Edit;
use App\Models\ContactDetails;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('component can be rendered', function () {
    Livewire::test(Edit::class)
        ->assertOk();
});

test('component is in view', function () {
    $this->actingAs($this->user);

    $this->get('/dashboard/contactDetails/edit')
        ->assertSeeLivewire(Edit::class);
});

test('guest cannot access page', function () {
    $this->get('/dashboard/contactDetails/edit')
        ->assertRedirect('login');
});

test('authed can access page', function () {
    $this->actingAs($this->user);

    $this->get('/dashboard/contactDetails/edit')
        ->assertOk();
});

test('contact name can be changed', function () {
    $this->actingAs($this->user);


    Livewire::test(Edit::class)
        ->set('contactDetails.0.name', 'test detail')
        ->call('save');

    $contactDetails = ContactDetails::first();

    expect($contactDetails->name)->toEqual('test detail');
});
