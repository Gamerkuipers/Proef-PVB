<?php

use App\Http\Livewire\Assignment\Create;
use App\Models\Assignment;
use App\Models\User;
use Livewire\Livewire;

test('component can be rendered',  function () {
   Livewire::test(Create::class)->assertOk();
});

test('component is in view', function () {
    $this->get('/')->assertSeeLivewire(Create::class);
});

test('can create assignment', function () {

    Livewire::test('assignment.create', ['assignment' => Assignment::factory()->create()])
        ->call('save');

    expect(Assignment::count())->toEqual(1);
});

test('required rules are required', function () {
    $this->actingAs(User::factory()->create());

    Livewire::test('assignment.create', ['assignment' => Assignment::factory()->create()])
        ->set('assignment.phone_numbers.0', '')
        ->call('save')
        ->assertHasErrors([
            'assignment.name',
            'assignment.target_audience',
            'assignment.description',
            'deadline',
            'assignment.company_name',
            'assignment.company_description',
            'assignment.email',
           'assignment.phone_numbers.*'
        ]);
});
