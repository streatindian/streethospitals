<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Category;
use App\Models\Country;
use App\Models\course;
use App\Models\Listing;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use DataTables;
use Exception;

class ProviderController extends Controller
{
    public function dashboard()
    {
        // return view('provider.dashboard');
        return redirect()->route('provider.listing.index');
    }
    public function index()
    {
        $data['listingCount'] = Listing::where(['user_id' => auth()->user()->id])->count();
        return view('provider.pages.listing.index', $data);
    }
    public function add()
    {
        $data['category'] = Category::where('type','listing')->get();
        return view('provider.pages.listing.add', $data);
    }
    public function form()
    {
        $category = request()->query('category');
        if (!$category) return redirect()->back()->with('error', 'Please Select Category First.');
        $category_id = decrypt($category);
        $data['listing'] = null;
        $data['category'] = Category::find($category_id);
        $data['category_list'] = Category::where('type','listing')->get();
        $data['service'] = Service::all();
        $data['country'] = Country::all();
        return view('provider.pages.listing.form', $data);
    }
    public function save(Request $request)
    {
        // dd($request->all());
        $rule = [];
        if ($request->type == 'hospital' || $request->type == 'clinic') {
            $rule['type'] = 'required';
            $rule['name'] = 'required|unique:listings,name,' . $request->id;
            $rule['phone'] = 'required|unique:listings,phone,' . $request->id;
            $rule['address'] = 'required';
            $rule['timing'] = 'required';
            $rule['year'] = 'required';
            $rule['days'] = 'required';

            $rule['service'] = 'required';
            $rule['country'] = 'required';
            $rule['state'] = 'required';
            $rule['email'] = 'required|unique:listings,email,' . $request->id;
            // $rule['email2'] = 'required|unique:listings,email2,'.$request->id;
            $rule['city'] = 'required';
            // $rule['phone2'] = 'required|unique:listings,phone2,'.$request->id;
            $rule['website'] = 'required';
            // $rule['director_name'] = 'required';
            // $rule['director_phone'] = 'required';
            // $rule['manager_name'] = 'required';
            // $rule['manager_phone'] = 'required';
            $rule['ot_service'] = 'required';
            // $rule['intensive_care_services'] = 'required';
            $rule['ambulance'] = 'required';
            $rule['pathology'] = 'required';
            $rule['is_radiodiagnosis'] = 'required';
            // $rule['radiodiagnosis'] = 'required';
            $rule['about'] = 'required';
            $rule['pathology'] = 'required';
            $rule['management'] = 'required';
            $rule['profile_pic'] = $request->id ? 'mimes:jpg,jpeg,png' : 'required|mimes:jpg,jpeg,png';
        } else if ($request->type == 'doctor') {
            $rule['type'] = 'required';
            $rule['name'] = 'required|unique:listings,name,' . $request->id;
            $rule['phone'] = 'required|unique:listings,phone,' . $request->id;
            $rule['address'] = 'required';
            $rule['country'] = 'required';
            $rule['state'] = 'required';
            $rule['city'] = 'required';
            $rule['about'] = 'required';
            $rule['email'] = 'required|unique:listings,email,' . $request->id;

            $rule['gender'] = 'required';
            $rule['degree'] = 'required';
            $rule['specialization'] = 'required';
            $rule['state_medical_council'] = 'required';
            $rule['registration_number'] = 'required';

            $rule['birth_date'] = 'required';
            $rule['birth_month'] = 'required';
            $rule['birth_year'] = 'required';

            $rule['blood_group'] = 'required';
            $rule['clinic_hospital_name'] = 'required';

            $rule['profile_pic'] = $request->id ? 'mimes:jpg,jpeg,png' : 'required|mimes:jpg,jpeg,png';
        } else if ($request->type == 'massage_parlour') {
            $rule['type'] = 'required';
            $rule['name'] = 'required|unique:listings,name,' . $request->id;
            $rule['email'] = 'required|unique:listings,email,' . $request->id;
            $rule['phone'] = 'required|unique:listings,phone,' . $request->id;
            $rule['country'] = 'required';
            $rule['state'] = 'required';
            $rule['city'] = 'required';
            $rule['address'] = 'required';
            $rule['pincode'] = 'required';
            $rule['massage_types'] = 'required';
            $rule['service_type'] = 'required';
            $rule['timing'] = 'required';
            $rule['days'] = 'required';
            $rule['about'] = 'required';
            $rule['profile_pic'] = $request->id ? 'mimes:jpg,jpeg,png' : 'required|mimes:jpg,jpeg,png';
            $rule['galary.*'] = 'mimes:png,jpg,jpeg|max:2048';
        }
        $this->validate($request, $rule);
        $uploadDir    = public_path('uploads/listing');
        File::isDirectory($uploadDir) or File::makeDirectory($uploadDir, 0777, true, true);
        $input = $request->all();
        // dd($input);
        // dd($request->intensive_care_services);
        if (isset($input['intensive_care_services'])) {
            $input['intensive_care_services'] = implode(',', $request->intensive_care_services);
        }
        if (isset($input['radiodiagnosis'])) {
            $input['radiodiagnosis'] = implode(',', $request->radiodiagnosis);
        }
        if (isset($input['massage_types'])) {
            $input['massage_types'] = implode(',', $request->massage_types);
        }
        if (isset($input['service_type'])) {
            $input['service_type'] = implode(',', $request->service_type);
        }

        // dd($input);
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
        $input['is_radiodiagnosis'] = (int) $request->is_radiodiagnosis;
        $matchThese = ['id' => $request->id];
        if (isset($input['id'])) {
            unset($input['id']);
        }
        $listing = Listing::updateOrCreate($matchThese, $input);
        if ($request->type == 'doctor') {
            // dd($listing);
            course::where('listing_id', $listing->id)->delete();
            // course::wdelete();
            if (count($request->course)) {
                foreach ($request->course as $cKey => $course) {
                    if (isset($request->passout_year[$cKey])) {
                        $cour = new course();
                        $cour->listing_id = $listing->id;
                        $cour->passout_year = $request->passout_year[$cKey];
                        $cour->course = $request->course[$cKey];
                        $cour->college = $request->college[$cKey];
                        $cour->city = '';
                        $cour->university = '';
                        $cour->save();
                    }
                }
            }
            // Association
            Association::where('listing_id', $listing->id)->delete();
            // Association::delete();

            if (count($request->associations)) {
                foreach ($request->associations as $cKey => $association) {
                    if (isset($request->associations[$cKey])) {
                        $ass = new Association();
                        $ass->listing_id = $listing->id;
                        $ass->association = $request->associations[$cKey];
                        $ass->branch = $request->branch_name[$cKey];
                        $ass->member_type = $request->member[$cKey];
                        $ass->save();
                    }
                }
            }
        }
        $user = auth()->user();
        $user->syncRoles('provider');
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
        $data['category_list'] = Category::where('type','listing')->get();
        $data['service'] = Service::all();
        $data['country'] = Country::all();
        // dd($data['category']);
        return view('provider.pages.listing.form', $data);
    }

    public function destroy($id)
    {
        // dd($id);
        Listing::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Record Delete Successfully.');
    }

    public function admin_provider_listing(Request $request)
    {
        if (!auth()->user()->can('provider_list')) abort(401);
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
                    $status =  $row->status == 'active' ? 'Active' : 'Inactive';
                    $alertClass =  $row->status == 'active' ? 'success' : 'danger';
                    return '<span class="label label-pill label-' . $alertClass . ' mt-2">' . $status . '</span>';
                })
                ->addColumn('action', function ($row) {
                    $viewUrl  = route('admin.provider.listing.view', $row->id);
                    $deleteUrl = route('provider.listing.destroy', $row->id);
                    $statusUrl = route('admin.provider.listing.status', $row->id);
                    $confirm = "onclick='return confirm(`Are You Sure!!`)'";
                    $action = '<div style="display:flex;">';
                    $action .= view('components.status', ['url' => $statusUrl]);
                    $action .= view('components.view', ['url' => $viewUrl]);
                    $action .= view('components.delete', ['url' => $deleteUrl]);
                    return $action;
                })
                ->rawColumns(['status', 'actions'])
                ->escapeColumns([])
                ->make(true);
        }
        return view('admin.pages.provider.index');
    }
    public function status($id, $status = '')
    {
        if (!auth()->user()->can('provider_status')) abort(401);
        try {
            $listing = Listing::findOrFail($id);
            $listing->status = $listing->status == 'active' ? 'inactive' : 'active';
            $listing->save();
            return redirect()->back()->with('success', 'Status Change Successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Status Not Change.');
        }
    }
    public function admin_view(Request $request, $id)
    {
        if (!auth()->user()->can('provider_view')) abort(401);
        // $category = request()->query('category');
        // if (!$category) return redirect()->back()->with('error', 'Please Select Category First.');
        // $category_id = decrypt($category);
        $listing = Listing::find($id);
        $data['listing'] = $listing;
        $data['category'] = Category::find($listing->category_id);
        $data['category_list'] = Category::where('type','listing')->get();
        $data['service'] = Service::all();
        $data['country'] = Country::all();
        // dd($data['category']);
        return view('admin.pages.provider.form', $data);
    }
}
