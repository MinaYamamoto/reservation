<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Reservation;
use Mail;
use App\Mail\ReservationMailSend;

class Batch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:confirmationMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '予約確認メール';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today()->format('y-m-d');

        $reservations = Reservation::where('date', $today)->get();

        foreach($reservations as $reservation) {
            $name = $reservation->user->name;
            $email = $reservation->user->email;
            $subject = '予約確認メール';
            $store = $reservation->store->name;
            $time =  Carbon::parse($reservation->time->time)->format('H時i分');
            $date =  Carbon::parse($reservation->date)->format('Y年m月d日');
            Mail::to($email)->send(new ReservationMailSend($name, $subject, $store, $time, $date));
        }
    }
}
