<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $checkRole = explode(',', $role);
        if(in_array('admin', $checkRole)) {
            return redirect('/admin/representative');
        } elseif(in_array('representative', $checkRole)) {
            return redirect('/admin/reservation');
        } elseif(in_array('user', $checkRole)) {
            return redirect('/mypage');
        }
    }
}
