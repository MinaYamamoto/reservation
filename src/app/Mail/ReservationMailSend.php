<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationMailSend extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $subject, string $store, string $time, string $date)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->store = $store;
        $this->time = $time;
        $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail_name = $this->name;
        $mail_subject = $this->subject;
        $mail_store = $this->store;
        $mail_time = $this->time;
        $mail_date = $this->date;
        return $this->view('mail.reservation')->from('mailcatcher@example.com')->subject($mail_subject)->with(['name' => $mail_name, 'store' => $mail_store, 'time' => $mail_time, 'date' => $mail_date]);
    }
}
