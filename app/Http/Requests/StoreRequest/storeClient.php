<?php

namespace App\Http\Requests\StoreRequest;

use Illuminate\Foundation\Http\FormRequest;

class storeClient extends FormRequest
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
           'telephone'=>'required|int|max:8',
           'email'=>'required|email|max:30',
           'username'=>'required|string|max:50|unique:users',
           'password'=>'required|string|max:30',
           'solde'=>'required|string|min:3'
        ];
    }
}
