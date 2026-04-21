<?php

namespace App\Http\Requests;

use App\Models\Chirp;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateChirpRequest extends BaseChirpRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $chirp = $this->route('chirp');
        return auth()->user()->can('update', $chirp);
    }
}
