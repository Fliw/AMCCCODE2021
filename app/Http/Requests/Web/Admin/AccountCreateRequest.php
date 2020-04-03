<?php

namespace App\Http\Requests\Web\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AccountCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'identity' => 'required|string|regex:/^[0-9]{2}.[0-9]{2}.[0-9]{4}$/',
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed|min:6'
        ];
    }
}
