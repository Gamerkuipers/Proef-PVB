<?php

namespace Tests\Feature\Livewire\GeneralInformation;

use App\Http\Livewire\GeneralInformation\Edit;
use App\Models\User;
use App\Models\WebContent;
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

    $this->get('/dashboard/generalInformation/edit')
        ->assertSeeLivewire(Edit::class);
});

test('authed can access page', function () {
    $this->actingAs($this->user);

    $this->get('/dashboard/generalInformation/edit')->assertOk();
});

test('guest cannot access page', function () {
    $this->get('/dashboard/generalInformation/edit')
        ->assertRedirect('login');
});

test('title can be changed', function () {
    $this->actingAs($this->user);

    Livewire::test(Edit::class)
        ->set('generalInformation.name', 'test information')
        ->call('save')
        ->assertRedirect('/dashboard/generalInformation');

    $generalInformation = WebContent::firstWhere('key', 'general_information');

    expect($generalInformation->name)->toEqual('test information');
});

test('body can be changed', function () {
    $this->actingAs($this->user);

    Livewire::test(Edit::class)
        ->set('generalInformation.body', 'this is test information')
        ->call('save');

    $generalInformation = WebContent::firstWhere('key', 'general_information');

    expect($generalInformation->body)->toEqual('this is test information');
});

test('guest cannot change general information', function () {
    Livewire::test(Edit::class)
        ->set('generalInformation.name', 'test name')
        ->call('save')
        ->assertForbidden();
});

test('authed can change general information', function () {
    $this->actingAs($this->user);

    Livewire::test(Edit::class)
        ->set('generalInformation.name', 'test name')
        ->call('save')
        ->assertOk();
});

