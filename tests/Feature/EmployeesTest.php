<?php

use App\Employee;
use App\User;
use function Tests\actingAs;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

it('displays employees to the user', function () {
    $user = factory(User::class)->create();
    $employee = factory(Employee::class)->create();

    actingAs($user)->get('/employees')->assertSee($employee->name);
});

it('shows an employee to the user', function () {
    $user = factory(User::class)->create();
    $employee = factory(Employee::class)->create();

    actingAs($user)
        ->get('/employees/' . $employee->id)
        ->assertSee($employee->name)
        ->assertSee($employee->email)
        ->assertSee($employee->phone);
});

it('allows an authenticated user to create an employee', function () {
    $user = factory(User::class)->create();
    $employee = factory(Employee::class)->make();

    actingAs($user)
        ->post('/employees', $employee->toArray());

    assertEquals(1, Employee::all()->count());
});

it('allows an authenticated user to update an employee', function () {
    $user = factory(User::class)->create();
    $employee = factory(Employee::class)->create();
    $employee->first_name = 'John';
    $employee->last_name = 'Birion';

    actingAs($user)
        ->put('/employees/' . $employee->id, $employee->toArray());

    $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'first_name' => 'John',
            'last_name' => 'Birion'
        ]);
});

it('doesn\'t allow a non-authed user to update an employee', function () {
    $employee = factory(Employee::class)->create();

    $this
        ->put('/employees/' . $employee->id, $employee->toArray())
        ->assertRedirect('/login');
});

it('requires a user to input a first name when creating an employee', function () {
    $user = factory(User::class)->create();
    $employee = factory(Employee::class)->make(['first_name' => null]);

    actingAs($user)
        ->post('/employees', $employee->toArray())
        ->assertSessionHasErrors('first_name');
});

it('requires a user to input a last name when creating an employee', function () {
    $user = factory(User::class)->create();
    $employee = factory(Employee::class)->make(['last_name' => null]);

    actingAs($user)
        ->post('/employees', $employee->toArray())
        ->assertSessionHasErrors('last_name');
});

it('requires a user to input a valid email when creating an employee', function () {
    $user = factory(User::class)->create();
    $employee = factory(Employee::class)->make(['email' => 'nonv@lidem@il']);

    actingAs($user)
        ->post('/employees', $employee->toArray())
        ->assertSessionHasErrors('email');
});

it('allows an authed user to delete an employee', function () {
    $user = factory(User::class)->create();
    $employee = factory(Employee::class)->create();

    actingAs($user)
        ->delete('/employees/' . $employee->id);

    $this->assertDatabaseMissing('employees', ['id' => $employee->id]);
});
