<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailSend;
use App\Http\Requests\MailRequest;


class MailController extends Controller
{
    public function index() {
        return view('admin/mail');
    }

    public function confirm(MailRequest $request) {
        $mail = $request->only(['name', 'email', 'subject', 'txt']);
        return view('admin/confirm', compact('mail'));
    }

    public function execute(Request $request) {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $txt = $request->txt;
        Mail::to($email)->send(new MailSend($name, $subject, $txt));
        return view('admin/result');
    }
}
