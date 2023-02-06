<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function user_profile()
    {
        return view('front.user.profile');
    }
    public function index()
    {
        return view('admin.pages.home');
    }

    public function perform()
    {
         $userRole = auth()->user()->roles()->first();

        Session::flush();

        Auth::logout();
        if(@$userRole->name == 'super_admin' ){
             return redirect()->route('login');
        }else{
            return redirect()->route('user.login');
        }

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
