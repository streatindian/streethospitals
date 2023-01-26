<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Listing;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use DataTables;

class ProviderController extends Controller
{
    public function dashboard()
    {
        // return view('provider.dashboard');
    }
    public function index()
    {
        $data['listingCount'] = Listing::where(['user_id' => auth()->user()->id])->count();
        return view('provider.pages.listing.index', $data);
    }
    public function add()
    {
        $data['category'] = Category::all();
        return view('provider.pages.listing.add', $data);
    }
    public function form()
    {
        $category = request()->query('category');
        if (!$category) return redirect()->back()->with('error', 'Please Select Category First.');
        $category_id = decrypt($category);
        $data['listing'] = null;
        $data['category'] = Category::find($category_id);
        $data['category_list'] = Category::all();
        $data['service'] = Service::all();
        $data['country'] = Country::all();
        return view('provider.pages.listing.form', $data);
    }
    public function save(Request $request)
    {
        $rule = [];
        // dd($request->all());
        if ($request->type == 'hospital') {
            $rule['type'] = 'required';
            $rule['name'] = 'required|unique:listings,name,'.$request->id;
            $rule['phone'] = 'required';
            $rule['address'] = 'required';
            $rule['timing'] = 'required';
            $rule['year'] = 'required';
            $rule['days'] = 'required';

            $rule['service'] = 'required';
            $rule['country'] = 'required';
            $rule['state'] = 'required';
            $rule['email'] = 'required';

            $rule['profile_pic'] = $request->id?'mimes:jpg,jpeg,png':'required|mimes:jpg,jpeg,png';
        }
        $this->validate($request, $rule);
        $uploadDir    = public_path('uploads/listing');
        File::isDirectory($uploadDir) or File::makeDirectory($uploadDir, 0777, true, true);

        $input = $request->all();
        // dd($input);
        // dd($request->intensive_care_services);
        if(isset($input['intensive_care_services'])){
            $input['intensive_care_services'] = implode(',',$request->intensive_care_services);
        }
        if(isset($input['radiodiagnosis'])){
            $input['radiodiagnosis'] = implode(',',$request->radiodiagnosis);
        }
        foreach (['profile_pic'] as $file) {
            if ($request->hasFile($file)) {
                $ImgValue     = $request->file($file);
                $getFileExt   = $ImgValue->getClientOriginalExtension();
                $uploadedFile =   time() . rand(0000, 9999) . '.' . $getFileExt;
                $ImgValue->move($uploadDir, $uploadedFile);
                $input[$file] = $uploadedFile;
                if ($request->id) {
                    $service = Listing::find($request->id);
                    $oldFile = $uploadDir . '/' . $service->{$file};
                    if (File::exists($oldFile)) {
                        File::delete($oldFile);
                    }
                }
            }
        }
        $input['user_id'] = Auth::user()->id;

        $matchThese = ['id' => $request->id];
        if (isset($input['id'])) {
            unset($input['id']);
        }
        $listing = Listing::updateOrCreate($matchThese, $input);
        return redirect()->route('provider.listing.index')->with('success', 'Listing ' . ($request->id ? 'Edit' : 'Add') . ' Successfully');
    }

    public function listing(Request $request)
    {
        if ($request->ajax()) {
            $data = Listing::where('user_id', auth()->user()->id)->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('profile_pic', function ($row) {
                    $imgUrl = asset('uploads/listing/' . $row->profile_pic);
                    if ($row->profile_pic)
                        return '<img src="' . $imgUrl . '" height="50" width="50">';
                    else return '';
                })
                ->editColumn('status', function ($row) {
                    return $row->status ? 'Active' : 'Inactive';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = $deleteUrl = route('provider.listing.edit', $row->id);
                    // $deleteUrl = route('speciality.destroy',$row->id);
                    $action = '<div style="display:flex;">';

                    $action .= '<a href="' . $editUrl . '" class="btn btn-primary btn-sm">Edit</a>&nbsp;';
                    $action .= '<form action="' . route('provider.listing.destroy', $row->id) . '" method="POST">
                        <input type="hidden" name="_method" value="delete" />
                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                        <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                        </form';
                    return $action;
                })

                ->rawColumns(['status', 'actions'])
                ->escapeColumns([])
                ->make(true);
        }
    }
    public function edit(Request $request, $id)
    {
        // $category = request()->query('category');
        // if (!$category) return redirect()->back()->with('error', 'Please Select Category First.');
        // $category_id = decrypt($category);
         $listing = Listing::find($id);
         $data['listing'] = $listing;
        $data['category'] = Category::find($listing->category_id);
        $data['category_list'] = Category::all();
        $data['service'] = Service::all();
        $data['country'] = Country::all();
        // dd($data['category']);
        return view('provider.pages.listing.form', $data);

    }

    public function destroy($id){
        // dd($id);
        Listing::where('id',$id)->delete();
        return redirect()->back()->with('success','Record Delete Successfully.');
    }
}
