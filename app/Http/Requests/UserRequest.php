<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

            return [
                'fullName'=>'required|min:3|max:20',
                'birthDate'=> [
                    'required',
                    'date',
                    'before:2007-01-01',
                ],
                'level'=>'required',
                'password'=>'required|min:8|max:12|confirmed',
                'university'=>'required',

                //
            ];

    }
}
