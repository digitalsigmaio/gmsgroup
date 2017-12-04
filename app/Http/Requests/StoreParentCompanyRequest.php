<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParentCompanyRequest extends FormRequest
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
            'ar_name' => 'required',
            'en_name' => 'required',
            'ar_about' => 'required',
            'en_about' => 'required',
            'ar_address' => 'required',
            'en_address' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'gmap' => 'required',
        ];
    }
}
