<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Collection;
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

        if(Auth::user()->hasRole('collector')){
            $data=Collection::with('totalrittik')->where('author_id',auth()->user()->id)->get();
        }elseif(Auth::user()->hasRole('admin')){
            $data=Collection::with('totalrittik')->get();
        }
        return view('backend.dashboard.dashboard',compact('data'));
    }
}
