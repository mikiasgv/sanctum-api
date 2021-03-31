<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
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
            'original_event_id' => ['required'],
            'original_place_id' => ['required'],
            'category' => ['required'],
            'name' => ['required'],
            'location' => ['required'],
            'rating' => ['required']
        ];
    }
}
