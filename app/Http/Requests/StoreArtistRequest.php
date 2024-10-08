<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtistRequest extends FormRequest
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
            'name' => 'required|string|max:150',
            'email' => 'required|email:rfc,dns|max:250|unique:artists,email',
            'mobile' => 'required|max:10',
            'brand_name' => 'required|string',
            'genre' => 'required|string',
            'location' => 'required|string'
        ];
    }
}
