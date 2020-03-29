<?php

namespace App\Http\Requests\Web\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class TicketOrderRequest extends FormRequest
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
            'order'                 => 'required|array',
            'order.ticket_id'       => 'required|numeric|min:1',
            'order.amount'          => 'required|string',
            'order.method_id'       => 'required|numeric|min:1',
            'attendee'              => 'required|array',
            'attendee.identity'     => 'required|string',
            'attendee.name'         => 'required|string|min:3',
            'attendee.institution'  => 'required|string|min:5',
            'attendee.email'        => 'required|email|unique:attendees,email',
            'attendee.whatsapp'     => 'required|digits_between:11,14'
        ];
    }
}
