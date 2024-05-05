<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('/admin/representative');
    }

    public function store(UserRequest $request)
    {
        $user = $request->only(['name', 'email']);
        $user['role'] = 'representative';
        $user['password'] = Hash::make($request['password']);
        User::create($user);
        return redirect('/admin/representative');
    }
}
