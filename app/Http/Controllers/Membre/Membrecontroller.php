<?php

namespace App\Http\Controllers\Membre;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class Membrecontroller extends Controller
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
        $role = Auth::user()->role;
        if ($role == 2) {
            return view('membre');
        } else {
            return redirect('home');
        }

    }

}
