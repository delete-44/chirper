<?php

use App\Models\Chirp;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

test('hasReplies returns false when chirp has no replies', function () {
  $chirp = Chirp::factory()->create();

  assertFalse($chirp->hasReplies());
});

test('hasReplies returns true when chirp has replies', function () {
  $chirp = Chirp::factory()->create();
  Chirp::factory()->create(['chirp_id' => $chirp->id]);

  assertTrue($chirp->hasReplies());
});
