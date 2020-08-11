<?php

namespace Tests;

use App\User;

/**
 * A basic assert example.
 */
function assertExample(): void
{
    test()->assertTrue(true);
}

function actingAs(User $user, string $driver = null)
{
    return test()->actingAs($user, $driver);
}
