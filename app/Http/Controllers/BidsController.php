<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Bid;
use Illuminate\Http\Request;
use Stripe\Charge;

class BidsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function place(Request $request, $id) {
        $auction = Auction::findOrFail($id);

        $request->validate([
            'price' => 'required|integer|min:'.$auction->price
        ]);

        // charge 10 percent
        $fee = (int) ($request->input('price') * 0.1);

        try {
            Charge::create(array(
                "amount" => $fee * 100,
                "currency" => "usd",
                "customer" => $request->user()->stripe_id
            ));
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->withError('We were unable to charge your card, please try again later.');
        }

        Bid::create([
            'user_id' => $request->user()->id,
            'auction_id' => $auction->id,
            'fee' => $request->input('price'),
            'paid' => $fee
        ]);

        return back()->with('success', 'Bid placed successfully and your card has been charged '. format_price($fee));
    }
}
