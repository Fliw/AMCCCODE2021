<?php

namespace App\Http\Requests\Web\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeamUpdateRequest extends FormRequest
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
            'team_name' => 'required|string|min:3',
            'institution' => 'required|string|min:3',
            'category_id' => 'required|numeric|exists:competition_categories,id',
            
            'leader_identity' => 'required|string|min:3',
            'leader_name' => 'required|string|min:3',
            'leader_whatsapp' => 'required|numeric',
            'leader_email' => 'required|email',

            'member' => 'sometimes|required|array',
            'member.*.nim' => 'required_with:member|string|min:3',
            'member.*.name' => 'required_with:member|string|min:3',
        ];
    }
}
