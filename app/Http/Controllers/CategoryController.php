<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('category_list')) abort(401);

        $data['category'] = Category::where('type', 'listing')->get();
        return view('admin.pages.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('category_add')) abort(401);
        $data['category'] = Category::where('type', 'listing')->get();
        $data['category_detail'] = null;
        return view('admin.pages.category.form', $data);
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
            if (!auth()->user()->can('category_edit')) abort(401);
            else
            if (!auth()->user()->can('category_add')) abort(401);


        $rule = [
            'name' => 'required|unique:categories,name,' . $request->id,
            'slug' => 'required|unique:categories,slug,' . $request->id,
            'thumbnail' => 'image|mimes:png,jpg|max:2048',
            'banner_image' => 'image|mimes:png,jpg|max:2048'
        ];
        if (!$request->id) {
            $rule['thumbnail'] =   'required|image|mimes:png,jpg|max:2048';
        }


        $this->validate($request, $rule);
        $uploadDir    = public_path('uploads/category');
        $input = $request->all();

        foreach (['thumbnail', 'banner_image'] as $file) {
            if ($request->hasFile($file)) {
                $ImgValue     = $request->file($file);
                $getFileExt   = $ImgValue->getClientOriginalExtension();
                $uploadedFile =   time() . rand(0000, 9999) . '.' . $getFileExt;
                $ImgValue->move($uploadDir, $uploadedFile);
                $input[$file] = $uploadedFile;
                if ($request->id) {
                    $category = Category::find($request->id);
                    $oldFile = $uploadDir . '/' . $category->{$file};
                    if (File::exists($oldFile)) {
                        File::delete($oldFile);
                    }
                }
            }
        }
        $input['slug'] = Str::slug($input['name']);
        $matchThese = ['id' => $request->id];
        if (isset($input['id'])) {
            unset($input['id']);
        }
        $category = Category::updateOrCreate($matchThese, $input);
        return redirect()->route('category.index', ['type' => $request->type])->with('success', 'Record ' . ($request->id ? 'Update' : 'Add') . ' Successfully');
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
        if (!auth()->user()->can('category_edit')) abort(401);
        $data['category'] = Category::where('type', 'listing')->get();
        $data['category_detail'] = Category::find($id);
        return view('admin.pages.category.form', $data);
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
        if (!auth()->user()->can('category_delete')) abort(401);
        Category::whereId($id)->delete();
        Session::flash('success', 'Record Delete Successfully');
        return redirect()->route('category.index', ['type' => request()->query('type') ? request()->query('type') : 'listing']);
    }

    public function listing(Request $request)
    {
        if ($request->ajax()) {
            $type = request()->query('type') ? request()->query('type') : 'listing';
            $data = Category::where('type', $type)->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('banner_image', function ($row) {
                    $imgUrl = asset('uploads/category/' . $row->banner_image);
                    if ($row->banner_image) return '<img src="' . $imgUrl . '" height="50" width="50">';
                    else return '';
                })
                ->editColumn('thumbnail', function ($row) {
                    $imgUrl = asset('uploads/category/' . $row->thumbnail);
                    if ($row->thumbnail)
                        return '<img src="' . $imgUrl . '" height="50" width="50">';
                    else return '';
                })
                ->editColumn('status', function ($row) {
                    return $row->status ? 'Active' : 'Inactive';
                })
                ->addColumn('action', function ($row) {
                    $editUrl =  route('category.edit', $row->id);
                    $deleteUrl = route('category.destroy', $row->id);
                    $action = '<div style="display:flex;">';
                    if (auth()->user()->can('category_edit')) {
                        $action .= view('components.edit', ['url' => $editUrl]);
                    }
                    if (auth()->user()->can('category_delete')) {
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
