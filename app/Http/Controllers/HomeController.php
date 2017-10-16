<?php

namespace App\Http\Controllers;

use App\Auction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_card');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctions = Auction::latest()->take(20)->get();

        return view('home', [
            'auctions' => $auctions
        ]);
    }
}
