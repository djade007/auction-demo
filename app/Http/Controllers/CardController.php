<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Customer;
use Stripe\Stripe;

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index() {
        return view('card');
    }

    public function store(Request $request) {
        $request->validate([
            'token' => 'required'
        ]);

        try {
            $customer = Customer::create(array(
                "email" => $request->user()->email,
                "source" => $request->input('token'),
                "description" => $request->user()->name
            ));
        } catch (\Exception $e) {
            return back()->withError('Unable to add your card, please try again later');
        }

        $request->user()->update([
            'stripe_customer_id' => $customer->id
        ]);

        return redirect('home')->withSuccess('Your card has been added successfully');
    }
}
