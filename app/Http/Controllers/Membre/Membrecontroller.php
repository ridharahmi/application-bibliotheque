<?php

namespace App\Http\Controllers\Membre;

use App\Fichier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
            $fichier = Fichier::where('status', 1)->paginate(9);
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
            }else{
                $input['password'] = Hash::make($input['password']);
                $input['password_confirmation'] = Hash::make($input['password']);
            }
            //dd($input);
            $user = User::findOrFail($id)->update($input);
            if ($user) {
                return redirect()->back()->with('success', 'Setting Updated successfully !');
            }
        }
        return view('membre.settings');
    }

    public function showbook($id)
    {
        $book = Fichier::findOrFail($id);
        return view('membre.book', compact('book'));
    }

    public function categorie($id){
        $fichier = Fichier::where('cat', $id)->where('status', 1)->paginate(9);
        return view('membre.categorie', compact('fichier'));
    }

}
