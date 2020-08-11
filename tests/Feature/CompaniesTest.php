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
        ->assertSee($company->url);
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
    $company->name = 'New company';

    actingAs($user)
        ->put('/companies/' . $company->id, $company->toArray());

    $this->assertDatabaseHas('companies', [
            'id' => $company->id,
            'name' => 'New company'
        ]);
});

it('doesn\'t allow a non-authed user to update a company', function () {
    $company = factory(Company::class)->create();

    $this
        ->put('/companies/' . $company->id, $company->toArray())
        ->assertRedirect('/login');
});

it('requires a user to input a name when creating a company', function () {
    $user = factory(User::class)->create();
    $company = factory(Company::class)->make(['name' => null]);

    actingAs($user)
        ->post('/companies', $company->toArray())
        ->assertSessionHasErrors('name');
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
