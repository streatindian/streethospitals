<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
        return view('admin.pages.home');
    }
     /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function perform()
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('login');
    }

    public function get_state(Request $request){
        $states = State::select('id','name as text')->where('country_id',$request->country)->get()->toArray();
        // $pos = 0;       // Position where you want to insert
        // array_splice($states, $pos, 0, array('id'=>0,'text'=>'Select State'));
        // dd($states);
        if(count($states)){
            return response()->json($states);
        }else{
            return response()->json([array('id'=>'','text'=>'Select State')]);
        }

    }

    public function get_city(Request $request){
        $states = City::select('id','name as text')->where('state_id',$request->state_id)->get()->toArray();
        // $pos = 0;       // Position where you want to insert
        // array_splice($states, $pos, 0, array('id'=>0,'text'=>'Select State'));
        // dd($states);
        if(count($states)){
            return response()->json($states);
        }else{
            return response()->json([array('id'=>'','text'=>'Select State')]);
        }

    }
}
