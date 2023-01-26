<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function user_profile()
    {
        return view('front.user.profile');
    }
}
