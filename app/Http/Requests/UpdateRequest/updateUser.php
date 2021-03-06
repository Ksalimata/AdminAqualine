<?php

namespace App\Http\Requests\UpdateRequest;

use Illuminate\Foundation\Http\FormRequest;

class updateUser extends FormRequest
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
             'nom'=>'required|string|min:2',
            'prenom'=>'required|string|max:30',
            'email'=>'required|email|max:30',
            'telephone'=>'required|numeric|max:8'
        ];
    }
}
