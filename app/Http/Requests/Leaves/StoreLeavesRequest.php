<?php

namespace App\Http\Requests\Leaves;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeavesRequest extends FormRequest
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
            ['empId' => 'required'],
            ['fromDate' => 'required|date_format:Y-m-d'],
            ['toDate' => 'required|date_format:Y-m-d'],
            ['duration' => 'required|max:100'],
            ['reason'   => 'required|max:255'],
        ];
    }
}
