<?php

namespace App\Http\Requests\Web\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ConfigurationCreateRequest extends FormRequest
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
        $types = getSupportedConfigTypes(true);

        return [
            'key' => 'required|string|unique:configurations,key',
            'type' => "required|string|in:{$types}",
            'value' => 'required|string',
            'active' => 'required|boolean'
        ];
    }
}
