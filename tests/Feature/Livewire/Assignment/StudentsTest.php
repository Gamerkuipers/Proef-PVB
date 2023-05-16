<?php

namespace Tests\Feature\livewire\assignment;

use App\Http\Livewire\Assignment\Students;
use App\Models\Assignment;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->assignment = Assignment::factory()->create();
});

test('component can be rendered', function () {
    Livewire::test(Students::class, [
        'assignment' => $this->assignment
    ])
        ->assertOk();
});

test('component is in view', function () {
    $this->actingAs($this->user);

    $this->get("/dashboard/assignments/{$this->assignment->id}")
        ->assertSeeLivewire(Students::class);
});

test('student cannot be added by guest', function () {

    $start_date = Carbon::now()
        ->setTime(0, 0)
        ->addWeek()
        ->format('Y-m-d H:i:s');
    $end_date = Carbon::now()
        ->setTime(0, 0)
        ->addWeeks(4)
        ->format('Y-m-d H:i:s');

    Livewire::test(Students::class, [
        'assignment' => $this->assignment
    ])
        ->set('student', 'John')
        ->set('start_date', $start_date)
        ->set('end_date', $end_date)
        ->call('addStudent')
        ->assertForbidden();
});

test('student can be created', function () {
    $this->actingAs($this->user);

    $start_date = Carbon::now()
        ->setTime(0, 0)
        ->addWeek()
        ->format('Y-m-d H:i:s');
    $end_date = Carbon::now()
        ->setTime(0, 0)
        ->addWeeks(4)
        ->format('Y-m-d H:i:s');

    Livewire::test(Students::class, [
        'assignment' => $this->assignment
    ])
        ->set('student', 'John')
        ->set('start_date', $start_date)
        ->set('end_date', $end_date)
        ->call('addStudent');

    expect($this->assignment->assigneds()->first()->student)
        ->toEqual('John');
    expect($this->assignment->assigneds()->first()->start_date)
        ->toEqual($start_date);
    expect($this->assignment->assigneds()->first()->end_date)
        ->toEqual($end_date);
});

test('start date must be today or later', function () {
    $this->actingAs($this->user);

    $start_date = Carbon::now()
        ->setTime(0, 0)
        ->subWeek()
        ->format('Y-m-d H:i:s');
    $end_date = Carbon::now()
        ->setTime(0, 0)
        ->addWeeks(4)
        ->format('Y-m-d H:i:s');

    Livewire::test(Students::class, [
        'assignment' => $this->assignment
    ])
        ->set('start_date', $start_date)
        ->set('end_date', $end_date)
        ->call('addStudent')
        ->assertHasErrors([
            'start_date'
        ]);
});

test('end date must be after start date', function () {
    $this->actingAs($this->user);

    $start_date = Carbon::now()
        ->setTime(0, 0)
        ->addWeek()
        ->format('Y-m-d H:i:s');
    $end_date = Carbon::now()
        ->setTime(0, 0)
        ->format('Y-m-d H:i:s');

    Livewire::test(Students::class, [
        'assignment' => $this->assignment
    ])
        ->set('start_date', $start_date)
        ->set('end_date', $end_date)
        ->call('addStudent')
        ->assertHasErrors([
            'end_date'
        ]);
});

test('student name cannot be empty', function () {
    $this->actingAs($this->user);

    Livewire::test(Students::class, [
        'assignment' => $this->assignment,
    ])
        ->set('student', ' ')
        ->call('addStudent')
        ->assertHasErrors([
            'student'
        ]);
});
