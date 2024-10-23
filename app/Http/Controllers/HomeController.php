<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payment;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 
        if (Auth::user()->email == 'admin@gmail.com') {
            # code...
            $payments = Payment::latest()->paginate(5);
           
        }else {
            # code...
            $payments = Payment::where('tenant_id', '=', Auth::id())->paginate(5);
        }
        // $payments = Payment::latest()->paginate(5);
        return view('home', compact('payments'));
    }
}
