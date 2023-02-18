<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    public function search_listing(Request $request)
    {
        $query = $request->get('query');
        $filterResults = Listing::where('address', 'LIKE', '%' . $query . '%')->get();
        $responseData = [];
        foreach ($filterResults as $filterResult) {
            $responseData[] = $filterResult->address;
        }
        return response()->json($responseData);
    }

    public function findListing(Request $request)
    {
        $listings = Listing::where(function ($query) use ($request) {
            $query->where('address', 'like', '%' . $request->search . '%')
                ->orWhere('name', 'like', '%' . $request->search . '%');
        })
            ->where('type', $request->type)
            // ->join('')
            ->get();
        if ($request->type == 'doctor')
            return view('front.doctorListing', compact('listings'));
        elseif ($request->type == 'hospital')
            return view('front.hospitalListing', compact('listings'));
    }

    public function doctorDetails($id)
    {
        $doctor = Listing::findOrFail(decrypt($id));
        return view('front.doctorDetail', compact('doctor'));
    }
}
