<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'checkIn'=>'required|date|after:tomorrow',
            'checkOut'=>'required|date|after:tomorrow',
            'statutBooking'=>'required',
            'typeBooking'=>'required',
            'totalPrice'=>'required',
            'numberPerson'=>'required',
            'room_id'=>'required',
            'user_id'=>'required',
        ];
    }
}
