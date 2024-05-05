<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailSend;
use App\Http\Requests\MailRequest;
use App\Models\User;


class MailController extends Controller
{
    public function listIndex()
    {
        $users = User::where('role', 'user')->get();
        return view('admin/mail_list', compact('users'));
    }

    public function index(Request $request) {
        $user_name = $request->user_name;
        $user_email = $request->user_email;
        return view('admin/mail', compact('user_name', 'user_email'));
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
        Mail::to($email)->send(new MailSend($name, $subject, $txt ?? ''));
        return view('admin/result');
    }
}
