<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['message', 'parent_id'])]

class Chirp extends Model
{
    /** @use HasFactory<ChirpFactory> */
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Chirp::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Chirp::class, 'parent_id');
    }

    public function hasReplies(): bool
    {
        return !$this->replies->isEmpty();
    }
}
