<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function dashboard(){
        return view('provider.dashboard');
    }

    public function add(){
        $data['category'] = Category::all();
        return view('provider.pages.listing.add',$data);
    }
}
