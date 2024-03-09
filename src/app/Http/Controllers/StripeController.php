<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\User;

class StripeController extends Controller
{
    public function charge(Request $request) {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Charge::create(array(
            'amount' => 1000,
            'currency' => 'jpy',
            'source' => request()->stripeToken,
        ));
        return redirect('/mypage');
    }
}