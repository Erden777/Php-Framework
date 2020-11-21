<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' =>'required',
            'email'=>'required|email|min:5|max:50',
            'password'=>'required|min:6|max:30'
        ];
    }

    //Қажет емес функция 
    public function attributes(){
        return [
            'name'=> 'Your name'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Incorrect name field',
            'email.email'=>'Incorrect email field'
        ];
    }
}
