<?php

use App\Models\Chirp;
use App\Models\User;

test('index', function () {
    $chirps = Chirp::factory()->count(3)->create();

    $response = $this->actingAsGuest()->get('/');

    $response->assertStatus(200);

    foreach ($chirps as $chirp) {
        $response->assertSeeText($chirp->message);
    }
});

test('store', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/chirps', [
        'message' => 'Test message'
    ]);

    $response->assertRedirect('/');

    $this->assertDatabaseHas('chirps', [
        'message' => 'Test message'
    ]);

    $this->assertDatabaseCount('chirps', 1);
});
