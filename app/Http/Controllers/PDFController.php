<?php

namespace App\Http\Controllers;
use App\Models\Reservation;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($reservation_id)
    {
    $user = auth()->user();
    
    $booking = Reservation::with('reservationdetails')
                ->where('user_id', $user->id)
                ->where('id', $reservation_id)
                ->firstOrFail();
    
               
         $pdf = PDF::loadView('pdfReservation', compact('booking'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('pdfReservation.pdf');
        
    }
}
