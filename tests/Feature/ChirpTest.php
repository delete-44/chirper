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

describe('#store', function () {
    test('store fails when user is signed out', function () {
        $response = $this->post('/chirps', [
            'message' => 'Test message'
        ]);

        $response->assertRedirect('/login');

        $this->assertDatabaseEmpty('chirps');
    });

    test('store completes when user is signed in', function () {
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

    test('store completes when user is replying to an existing chirp', function () {
        $user = User::factory()->create();
        $chirp = Chirp::factory()->create();

        $response = $this->actingAs($user)->post('/chirps', [
            'message' => 'Test message',
            'chirp_id' => $chirp->id
        ]);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('chirps', [
            'message' => 'Test message',
            'chirp_id' => $chirp->id
        ]);

        $this->assertDatabaseCount('chirps', 2);
    });
});

describe('#update', function () {
    test('update fails when signed out', function () {
        $chirp = Chirp::factory()->create([
            'message' => 'Existing message'
        ]);

        $response = $this->put("/chirps/$chirp->id", [
            'message' => 'Updated message'
        ]);

        $response->assertRedirect('/login');

        $this->assertDatabaseHas('chirps', [
            'message' => 'Existing message'
        ]);

        $this->assertDatabaseCount('chirps', 1);
    });

    test('update fails when performed by different user to chirp owner', function () {
        $otherUser = User::factory()->create();
        $chirp = Chirp::factory()->create([
            'message' => 'Existing message'
        ]);

        $response = $this->actingAs($otherUser)->put("/chirps/$chirp->id", [
            'message' => 'Updated message'
        ]);

        $response->assertForbidden();

        $this->assertDatabaseHas('chirps', [
            'message' => 'Existing message'
        ]);

        $this->assertDatabaseCount('chirps', 1);
    });

    test('update completes when performed by chirp owner', function () {
        $chirp = Chirp::factory()->create([
            'message' => 'Existing message'
        ]);

        $response = $this->actingAs($chirp->user)->put("/chirps/$chirp->id", [
            'message' => 'Updated message'
        ]);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('chirps', [
            'message' => 'Updated message'
        ]);

        $this->assertDatabaseCount('chirps', 1);
    });
});

describe('#destroy', function () {
    test('destroy fails when signed out', function () {
        $chirp = Chirp::factory()->create();

        $response = $this->delete("/chirps/$chirp->id");

        $response->assertRedirect('/login');

        $this->assertDatabaseCount('chirps', 1);
    });

    test('destroy fails when performed by different user to chirp owner', function () {
        $otherUser = User::factory()->create();
        $chirp = Chirp::factory()->create();

        $response = $this->actingAs($otherUser)->delete("/chirps/$chirp->id");

        $response->assertForbidden();

        $this->assertDatabaseCount('chirps', 1);
    });

    test('destroy completes when performed by chirp owner', function () {
        $chirp = Chirp::factory()->create();

        $response = $this->actingAs($chirp->user)->delete("/chirps/$chirp->id");

        $response->assertRedirect('/');

        $this->assertDatabaseCount('chirps', 0);
    });
});
