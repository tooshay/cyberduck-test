<?php

use App\Company;
use App\User;
use function Tests\actingAs;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

it('displays companies to the user', function () {
    $user = factory(User::class)->create();
    $company = factory(Company::class)->create();

    actingAs($user)->get('/companies')->assertSee($company->name);
});

it('shows a company to the user', function () {
    $user = factory(User::class)->create();
    $company = factory(Company::class)->create();

    actingAs($user)
        ->get('/companies/' . $company->id)
        ->assertSee($company->name)
        ->assertSee($company->email)
        ->assertSee($company->phone);
});

it('allows an authenticated user to create a company', function () {
    $user = factory(User::class)->create();
    $company = factory(Company::class)->make();

    actingAs($user)
        ->post('/companies', $company->toArray());

    assertEquals(1, Company::all()->count());
});

it('allows an authenticated user to update a company', function () {
    $user = factory(User::class)->create();
    $company = factory(Company::class)->create();
    $company->first_name = 'John';
    $company->last_name = 'Birion';

    actingAs($user)
        ->put('/companies/' . $company->id, $company->toArray());

    $this->assertDatabaseHas('companies', [
            'id' => $company->id,
            'first_name' => 'John',
            'last_name' => 'Birion'
        ]);
});

it('doesn\'t allow a non-authed user to update a company', function () {
    $company = factory(Company::class)->create();

    $this
        ->put('/companies/' . $company->id, $company->toArray())
        ->assertRedirect('/login');
});

it('requires a user to input a first name when creating a company', function () {
    $user = factory(User::class)->create();
    $company = factory(Company::class)->make(['first_name' => null]);

    actingAs($user)
        ->post('/companies', $company->toArray())
        ->assertSessionHasErrors('first_name');
});

it('requires a user to input a last name when creating a company', function () {
    $user = factory(User::class)->create();
    $company = factory(Company::class)->make(['last_name' => null]);

    actingAs($user)
        ->post('/companies', $company->toArray())
        ->assertSessionHasErrors('last_name');
});

it('requires a user to input a valid email when creating a company', function () {
    $user = factory(User::class)->create();
    $company = factory(Company::class)->make(['email' => 'nonv@lidem@il']);

    actingAs($user)
        ->post('/companies', $company->toArray())
        ->assertSessionHasErrors('email');
});

it('allows an authed user to delete a company', function () {
    $user = factory(User::class)->create();
    $company = factory(Company::class)->create();

    actingAs($user)
        ->delete('/companies/' . $company->id);

    $this->assertDatabaseMissing('companies', ['id' => $company->id]);
});
