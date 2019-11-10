<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateStaff extends FormRequest
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
            'staffName' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'position' => 'required|string',
            'email' => 'required|string|unique:clinicStaffs,email,'.Auth::guard('clinicstaff')->user()->staffId.',staffId',
            'password' => 'nullable|confirmed|min:6',
        ];
    }
}
