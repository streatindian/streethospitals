<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


use DataTables;


class PageController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('page_list')) abort(401);

        return view('admin.pages.page.index');
    }
    public function create()
    {
        if (!auth()->user()->can('page_add')) abort(401);
        $data['page_detail'] = null;
        return view('admin.pages.page.form', $data);
    }

    public function store(Request $request)
    {
        if ($request->id)
            if (!auth()->user()->can('page_edit')) abort(401);
            else
            if (!auth()->user()->can('page_add')) abort(401);


        $rule = [
            'title' => 'required|unique:pages,title,' . $request->id,
            'slug' => 'required|unique:pages,slug,' . $request->id,
            'thumbnail' => 'image|mimes:png,jpg|max:2048',
            'banner_image' => 'image|mimes:png,jpg|max:2048'
        ];
        if (!$request->id) {
            $rule['thumbnail'] =   'required|image|mimes:png,jpg|max:2048';
        }


        $this->validate($request, $rule);
        $uploadDir    = public_path('uploads/page');
        $input = $request->all();

        foreach (['thumbnail', 'banner_image'] as $file) {
            if ($request->hasFile($file)) {
                $ImgValue     = $request->file($file);
                $getFileExt   = $ImgValue->getClientOriginalExtension();
                $uploadedFile =   time() . rand(0000, 9999) . '.' . $getFileExt;
                $ImgValue->move($uploadDir, $uploadedFile);
                $input[$file] = $uploadedFile;
                if ($request->id) {
                    $page = Page::find($request->id);
                    $oldFile = $uploadDir . '/' . $page->{$file};
                    if (File::exists($oldFile)) {
                        File::delete($oldFile);
                    }
                }
            }
        }
        $input['slug'] = Str::slug($input['title']);
        $matchThese = ['id' => $request->id];
        if (isset($input['id'])) {
            unset($input['id']);
        }
        $page = Page::updateOrCreate($matchThese, $input);
        return redirect()->route('page.index', ['type' => $request->type])->with('success', 'Record ' . ($request->id ? 'Update' : 'Add') . ' Successfully');
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
        // if (!auth()->user()->can('page_edit')) abort(401);
        // $data['page'] = Category::where('type', 'listing')->get();
        // return view('admin.pages.category.form', $data);
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
            $data = Page::get();
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
                    $editUrl =  route('page.edit', $row->id);
                    $deleteUrl = route('page.destroy', $row->id);
                    $action = '<div style="display:flex;">';
                    if (auth()->user()->can('page_edit')) {
                        $action .= view('components.edit', ['url' => $editUrl]);
                    }
                    if (auth()->user()->can('page_delete')) {
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
