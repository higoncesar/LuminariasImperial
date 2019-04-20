<?php

namespace IluminariasImperial\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
        $image=null;
        if($this->isMethod('post'))
        $image = 'required|image|mimes:jpeg,png,jpg|dimensions:min_width=500,min_height=500';
        else
        $image = 'image|mimes:jpeg,png,jpg|dimensions:min_width=500,min_height=500';

        return [
            'name'=>'required|unique:products,name,'.$this->id,
            'description'=>'required',
            'type_id'=>'required|exists:types,id',
            'color_id'=>'required',
            'size_id'=>'required',
            'image'=>$image
        ];
    }
}
