<?php

namespace Tests\Unit;

use App\Models\Chirp;
use Tests\TestCase;


class ChirpTest extends TestCase
{
  public function test_hasReplies_returns_false_when_chirp_has_no_replies()
  {
    $chirp = Chirp::factory()->create();
    $this->assertFalse($chirp->hasReplies());
  }

  public function test_hasReplies_returns_true_when_chirp_has_replies()
  {
    $chirp = Chirp::factory()->create();
    Chirp::factory()->create(['parent_id' => $chirp->id]);

    $this->assertTrue($chirp->hasReplies());
  }
}
