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
}
