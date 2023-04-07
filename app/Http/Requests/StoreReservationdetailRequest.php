<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationdetailRequest extends FormRequest
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
           
            'checkIn' => ['required', 'date', 'after_or_equal:today'],
        'checkOut' => ['required', 'date', 'after:checkIn'],
        'chambre_id' => ['required', 'exists:chambres,id'],
        'numberPerson'=>['required','numeric','min:1'],
        'total_payement'=>['required','numeric'],
        'userName' => ['required', 'string', 'max:255'],
        'phoneNum' => ['required', 'string', 'max:255'],
        'address' => ['required', 'string', 'max:255'],
        'price' => ['required', 'numeric', 'min:0'],
        // 'reservation_id' => 'required|exists:reservations,id',
        // 'user_id' => 'required|exists:users,id',
        ];
    }
}
