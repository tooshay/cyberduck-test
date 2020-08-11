<?php

namespace Tests\Feature;

use App\Employee;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_view_all_employees()
    {
        $user = factory(User::class)->create();
        $employee = factory(Employee::class)->create();

        $response = $this
            ->actingAs($user)
            ->get('/employees');
$response->dump();
        $response->assertSee($employee->name);
    }
}
