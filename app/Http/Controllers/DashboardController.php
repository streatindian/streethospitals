<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function user_profile()
    {
        $data['country'] = Country::all();
        return view('front.user.profile')->with($data);
    }
    public function index()
    {
        return view('admin.pages.home');
    }
    public function user_profile_update(Request $request)
    {
        // dd($request->all());
        $rule = [
            'name' => 'required', 'phone' => 'required', 'address' => 'required', 'pincode' => 'required'
        ];
        $rule['profile_pic'] = $request->id ? 'mimes:jpg,jpeg,png' : 'required|mimes:jpg,jpeg,png';
        $this->validate($request, $rule);
        $uploadDir    = public_path('uploads/users');
        File::isDirectory($uploadDir) or File::makeDirectory($uploadDir, 0777, true, true);
        $input = $request->all();
        foreach (['profile_pic'] as $file) {
            if ($request->hasFile($file)) {
                $ImgValue     = $request->file($file);
                $getFileExt   = $ImgValue->getClientOriginalExtension();
                $uploadedFile =   time() . rand(0000, 9999) . '.' . $getFileExt;
                $ImgValue->move($uploadDir, $uploadedFile);
                $input[$file] = $uploadedFile;
                if ($request->id) {
                    $service = User::find($request->id);
                    $oldFile = $uploadDir . '/' . $service->{$file};
                    if (File::exists($oldFile)) {
                        File::delete($oldFile);
                    }
                }
            }
        }
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->update($input);
        return redirect()->back()->with('success','Profile update successfully.');
    }
    public function perform()
    {
        $userRole = auth()->user()->roles()->first();

        Session::flush();

        Auth::logout();
        if (@$userRole->name == 'super_admin') {
            return redirect()->route('login');
        } else {
            return redirect()->route('user.login');
        }
    }

    public function get_state(Request $request)
    {
        $states = State::select('id', 'name as text')->where('country_id', $request->country)->get()->toArray();
        // $pos = 0;       // Position where you want to insert
        // array_splice($states, $pos, 0, array('id'=>0,'text'=>'Select State'));
        // dd($states);
        if (count($states)) {
            return response()->json($states);
        } else {
            return response()->json([array('id' => '', 'text' => 'Select State')]);
        }
    }

    public function get_city(Request $request)
    {
        $states = City::select('id', 'name as text')->where('state_id', $request->state_id)->get()->toArray();
        // $pos = 0;       // Position where you want to insert
        // array_splice($states, $pos, 0, array('id'=>0,'text'=>'Select State'));
        // dd($states);
        if (count($states)) {
            return response()->json($states);
        } else {
            return response()->json([array('id' => '', 'text' => 'Select State')]);
        }
    }
}
