<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (!auth()->user()->can('service_list')) abort(401);
        $data['service'] = Service::all();
        return view('admin.pages.service.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('service_add')) abort(401);
        $data['service'] = Service::all();
        return view('admin.pages.service.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->id)
            if (!auth()->user()->can('service_edit')) abort(401);
            else
            if (!auth()->user()->can('service_add')) abort(401);

        $this->validate($request, [
            'name' => 'required|unique:services,name,' . $request->id,
            'slug' => 'required|unique:services,slug,' . $request->id,
            'icon' => 'image|mimes:png,jpg|max:2048',
            'banner' => 'image|mimes:png,jpg|max:2048'
        ]);
        $uploadDir    = public_path('uploads/service');
        File::isDirectory($uploadDir) or File::makeDirectory($uploadDir, 0777, true, true);
        $input = $request->all();
        foreach (['icon', 'banner'] as $file) {
            if ($request->hasFile($file)) {
                $ImgValue     = $request->file($file);
                $getFileExt   = $ImgValue->getClientOriginalExtension();
                $uploadedFile =   time() . rand(0000, 9999) . '.' . $getFileExt;
                $ImgValue->move($uploadDir, $uploadedFile);
                $input[$file] = $uploadedFile;
                if($request->id){
                    $service = Service::find($request->id);
                    $oldFile = $uploadDir.'/'.$service->{$file};
                    if (File::exists($oldFile)) {
                        File::delete($oldFile);
                    }
                }
            }

        }


        $matchThese = ['id' => $request->id];
        if (isset($input['id'])) {
            unset($input['id']);
        }
        $ervice = Service::updateOrCreate($matchThese, $input);
        return redirect()->back()->with('success', 'Record Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['service'] = Service::all();
        $data['serviceDetail'] = Service::findOrFail($id);
        return view('admin.pages.service.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('service_delete')) abort(401);
        Service::whereId($id)->delete();
        Session::flash('success', 'Record Delete Successfully');
        return redirect()->route('service.index');
    }

    public function listing(Request $request)
    {
        if (!auth()->user()->can('service_list')) abort(401);
        if ($request->ajax()) {
            $data = Service::all();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('banner', function ($row) {
                    $imgUrl = asset('uploads/service/' . $row->banner);
                    return '<img src="' . $imgUrl . '" height="50" width="50">';
                })
                ->editColumn('icon', function ($row) {
                    $imgUrl = asset('uploads/service/' . $row->icon);
                    return '<img src="' . $imgUrl . '" height="50" width="50">';
                })
                ->editColumn('status', function ($row) {
                    return $row->status?'Active':'Inactive';
                })
                ->editColumn('parent', function ($row) {
                    return @$row->parentService->name;
                })
                ->addColumn('action', function ($row) {
                    $editUrl = $deleteUrl = route('service.edit', $row->id);
                    // $deleteUrl = route('speciality.destroy',$row->id);

                    $editUrl =  route('service.edit', $row->id);
                    $deleteUrl = route('service.destroy', $row->id);
                    $action = '<div style="display:flex;">';
                    if (auth()->user()->can('service_edit')) {
                        $action .= view('components.edit', ['url' => $editUrl]);
                    }
                    if (auth()->user()->can('service_delete')) {
                        $action .= view('components.delete', ['url' => $deleteUrl]);
                    }
                    $action .= '</div>';
                    return $action;
                })

                ->rawColumns(['status', 'actions'])
                ->escapeColumns([])
                ->make(true);
        }
    }
}
