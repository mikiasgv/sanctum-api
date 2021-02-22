<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:191', 'unique:events'],
            'description' => ['required'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'location' => ['required'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'status' => ['required']

        ];
    }
}
