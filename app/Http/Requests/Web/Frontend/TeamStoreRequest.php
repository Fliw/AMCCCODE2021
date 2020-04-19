<?php

namespace App\Http\Requests\Web\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class TeamStoreRequest extends FormRequest
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
            'tim' => 'required|array',
            'tim.nama' => 'required_with:tim|string|min:3',
            'tim.institusi' => 'required_with:tim|string|min:3',
            'tim.kategori' => 'required_with:tim|numeric|exists:competition_categories,id',
            
            'ketua' => 'required|array',
            'ketua.nim' => 'required_with:ketua|string|min:3',
            'ketua.nama' => 'required_with:ketua|string|min:3',
            'ketua.whatsapp' => 'required_with:ketua|numeric',

            'member' => 'sometimes|required|array',
            'member.*.nim' => 'required_with:member|string|min:3',
            'member.*.name' => 'required_with:member|string|min:3',
            
            'email' => 'required|email|unique:attendees,email',
            'password' => 'required|string|min:6|confirmed'
        ];
    }
}
