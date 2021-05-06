<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class UserRequest extends FormRequest
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
            'name' => 'required|max:255|unique:users,name,' .$this->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'description' => 'required',
            'born_year' => 'required|date_format:Y-m-d|before:today|nullable',
           
        ];
    }

}
