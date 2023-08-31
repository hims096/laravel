<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'email' => 'required|unique:students|max:100',
            'phone' => 'required|unique:students|max:11',
            'address' => 'required|string|max:50',
            'dob' => 'required|date|after:start_date',
            //            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ];
    }
    public function messages(): array
    {
        return [
            'fname.required' => 'Frist Name is Mandatory',
            'lname.required' => 'Last Name is Mandatory',
            'email.required' => 'Email ID is Mandatory',
            'phone.required' => 'Phone Number is Mandatory ',
            'address.required' => 'Address is Mandatory',
            'dob.required' => 'Date Of Birth is Mandatory',
            //            'image.required' => 'Please Upload "jpeg, png, jpg, gif" file',

        ];
    }
}
