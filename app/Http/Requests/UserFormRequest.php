<?php

namespace IluminariasImperial\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        $password = null;
        if($this->isMethod('post')){
            $password ='required|string|min:6|confirmed';
        }
        else{
            if(isset($this->password)){
                $password ='required|string|min:6|confirmed';
            }else{
                $password = '';
            }
        }
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->id,
            'password'=>$password,
        ];
    }
}
