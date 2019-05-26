<?php

namespace App\Http\Controllers\Membre;

use App\Fichier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

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
    public function index(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == 2) {
            $fichier = Fichier::where('status', 0)->paginate(9);
            return view('membre', compact('fichier'));
        } else {
            return redirect('home');
        }

    }

    public function settings(Request $request)
    {
        $id = Auth::user()->id;
        $input = $request->all();
        if ($request->isMethod('post')) {
            if ($input['password'] == null) {
                $input['password'] = Auth::user()->password;
                $input['password_confirmation'] = Auth::user()->password;
            }
            //dd($input);
            $user = User::findOrFail($id)->update($input);
            if ($user) {
                return redirect()->back()->with('success', 'Setting Updated successfully !');
            }
        }
        return view('membre.settings');
    }

}
