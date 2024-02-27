<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use App\Models\Store;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request)
    {
        $request->session()->flashInput($request->input());
        $reservation = $request->only(['user_id', 'store_id', 'date', 'time_id', 'num_id']);
        Reservation::create($reservation);
        return view('done');
    }

    public function destroy(Request $request)
    {
        $reservation = Reservation::where('id', $request->reservation_id)->first();
        $reservation->delete();
        $request->session()->flash('delete_message', '予約を削除しました');
        return redirect('/mypage');
    }

    public function update(ReservationRequest $request)
    {
        $newReservation = $request->only(['date', 'time_id', 'num_id']);
        Reservation::find($request->id)->update($newReservation);
        return redirect('/mypage');
    }

    public function search(Request $request) {
        $user_id = auth()->id();
        $store = Store::where('user_id', $user_id)->get();
        $search_day = new carbon($request->search_day);
        if($request->today__reservation == "today__reservation") {
            $search_day = Carbon::today();
        } else if($request->last_day == "last_day") {
            $search_day = $search_day->subDay();
        } else if($request->next_day == "next_day") {
            $search_day = $search_day->addDay();
        }
        $reservations = Reservation::where('date', $search_day)->orderby('store_id', 'asc')->orderby('time_id', 'asc')->get();
        return view('admin/reservation', compact('search_day', 'reservations','user_id'));
    }

    public function detail(Request $request) {
        $reservation = Reservation::find($request->reservation_id);
        return view('admin/reservation_detail', compact('reservation'));
    }
}
