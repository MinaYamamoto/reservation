<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request) {
        $reservation = $request->only(['user_id', 'store_id', 'date', 'time_id', 'num_id']);
        Reservation::create($reservation);
        return view('done');
    }
}
