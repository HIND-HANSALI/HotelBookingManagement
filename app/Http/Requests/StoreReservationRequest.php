<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
            'checkIn'=>'required|date',
            
            'checkOut'=>'required|date',
            // 'statutBooking'=>'required',
            // 'typeBooking'=>'required',
            // 'totalPrice'=>'required',
            // 'numberPerson'=>'required',
            'chambre_id'=>'required',
            'user_id'=>'required',
            
        ];
    }
}
