<?php

namespace App\Http\Requests;

use App\Enums\MemorySizeEnum;
use App\Enums\MemoryTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMemoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => [Rule::enum(MemoryTypeEnum::class)],
            'size' => [Rule::enum(MemorySizeEnum::class)],
        ];
    }
}