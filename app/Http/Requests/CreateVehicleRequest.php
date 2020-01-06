<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleRequest extends FormRequest
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
            'name' => 'required',
            'number' => 'required|unique:vehicles',
            'sMilage' => 'required',
            'license_exp' => 'required',
            'next_service' => 'required',
            'gear_oil_change' => 'required',
            'insurance_exp' => 'required'
        ];
    }
}
