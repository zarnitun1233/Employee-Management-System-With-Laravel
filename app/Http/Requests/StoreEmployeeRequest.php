<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreEmployeeRequest extends FormRequest
{   
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {    
        return  true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {  
        return [
            'name' => ['required','min:3','max:20'],
            'position' => ['required'],
            'role' => ['required'],
            'age' => ['required','min:1','max:2'],
            'email' => ['required','min:6','max:30','email'],
            'password' => ['required','required_with:confirmPassword','same:confirmPassword'],
            'confirmPassword' => ['required'],
            'image' => ['required','image','mimes:jpeg,jpg,png','max:2048'],
            'phone' => ['required','min:5','max:11'],
            'dob' => ['required'],
            'address' => ['required','min:5','max:100'],
            'department_id' => ['required','min:1','max:10'],
            'salary' => ['required','min:4','max:20'],
        ];
    }
}
