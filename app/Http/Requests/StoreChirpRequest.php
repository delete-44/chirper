<?php

namespace App\Http\Requests;

use App\Models\Chirp;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreChirpRequest extends BaseChirpRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('create', Chirp::class);
    }
}
