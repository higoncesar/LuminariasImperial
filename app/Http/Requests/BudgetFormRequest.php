<?php

namespace IluminariasImperial\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetFormRequest extends FormRequest
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
            'client_name'=>'required',
            'client_email'=>'required|email',
            'client_phone'=>'required|numeric',
            'description'=>'required'
        ];
    }
}
