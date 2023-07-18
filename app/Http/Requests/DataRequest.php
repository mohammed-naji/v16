<?php

namespace App\Http\Requests;

use App\Rules\WordCount;
use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:4', 'max:30'],
            'email' => 'required|ends_with:@gmail.com',
            'phone' => 'required',
            'age' => 'required|gt:30',
            'message' => ['required', new WordCount(8) ]
        ];
    }
}
