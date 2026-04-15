<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('no puedes eliminar tu propio usuario', function () {
    $user = User::factory()->create([
        'email_verified_at' => now(),
    ]);

    $this->actingAs($user, 'web');

    $response = $this->delete(route('admin.users.destroy', $user));

    $response->assertStatus(403);

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
    ]);

});
