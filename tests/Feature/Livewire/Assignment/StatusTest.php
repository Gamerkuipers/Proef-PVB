<?php

namespace Tests\Feature\Livewire\Assignment;

use App\Enums\AssignmentStatusses;
use App\Http\Livewire\Assignment\Status;
use App\Models\Assignment;
use App\Models\User;
use Livewire\Livewire;

beforeEach(fn() => $this->user = User::factory()->create());

test('component can be rendered', function () {
    Livewire::test(Status::class, [
        'assignment' => Assignment::factory()->create(),
    ])->assertOk();
});

test('component is in view', function () {
    $this->actingAs($this->user);

    $assignment = Assignment::factory()->create();

    $this->get("/dashboard/assignments/{$assignment->id}")
        ->assertSeeLivewire(Status::class);
});

test('Status can be changed', function () {
    $this->actingAs($this->user);

    $assignment = Assignment::factory()->create([
        'status' => AssignmentStatusses::OPEN->value,
    ]);

    Livewire::test(Status::class, [
        'assignment' => $assignment
    ])
        ->set('assignment.status', AssignmentStatusses::ASSIGNED->value);

    $assignment->refresh();

    expect($assignment->status)->toBe(AssignmentStatusses::ASSIGNED->value);
});

test('status can be changed by unauthorized user', function () {
    $assignment = Assignment::factory()->create([
        'status' => AssignmentStatusses::OPEN->value,
    ]);

    Livewire::test(Status::class, [
        'assignment' => $assignment
    ])
        ->set('assignment.status', AssignmentStatusses::ASSIGNED->value)
        ->assertForbidden();
});

test('log created after status changed', function () {
    $this->actingAs($this->user);

    $assignment = Assignment::factory()->create([
        'status' => AssignmentStatusses::OPEN->value,
    ]);

    Livewire::test(Status::class, [
        'assignment' => $assignment
    ])
        ->set('assignment.status', AssignmentStatusses::ASSIGNED->value);

    $log = $assignment->logs()->first();

    expect($log->exists())->toBeTrue();
    expect($log->old_status)->toBe(AssignmentStatusses::OPEN->value);
    expect($log->new_status)->toBe(AssignmentStatusses::ASSIGNED->value);
});

test('log does not get created if status is the unchanged', function () {
    $this->actingAs($this->user);

    $assignment = Assignment::factory()->create([
        'status' => AssignmentStatusses::OPEN->value,
    ]);

    Livewire::test(Status::class, [
        'assignment' => $assignment
    ])
        ->set('assignment.status', AssignmentStatusses::OPEN->value);

    expect($assignment->logs()->count())->toBe(0);
});

test('emitted status changed event if status is changed', function () {
    $this->actingAs($this->user);

    $assignment = Assignment::factory()->create([
        'status' => AssignmentStatusses::OPEN->value,
    ]);

    Livewire::test(Status::class, [
        'assignment' => $assignment
    ])
        ->set('assignment.status', AssignmentStatusses::ASSIGNED->value)
        ->assertEmitted('addedStatus');
});

test('don\'t emit status changed event if status is unchanged', function () {
    $this->actingAs($this->user);

    $assignment = Assignment::factory()->create([
        'status' => AssignmentStatusses::OPEN->value,
    ]);

    Livewire::test(Status::class, [
        'assignment' => $assignment
    ])
        ->set('assignment.status', AssignmentStatusses::OPEN->value)
        ->assertNotEmitted('addedStatus');
});
