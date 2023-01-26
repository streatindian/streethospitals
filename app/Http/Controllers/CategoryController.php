<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['category'] = Category::all();
        return view('admin.pages.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = Category::all();
        return view('admin.pages.category.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'thumbnail' => 'required|image|mimes:png,jpg|max:2048',
            'banner_image' => 'image|mimes:png,jpg|max:2048'
        ]);
        $uploadDir    = public_path('uploads/category');
        $input = $request->all();
        foreach (['thumbnail', 'banner_image'] as $file) {
            if ($request->hasFile($file)) {
                $ImgValue     = $request->file($file);
                $getFileExt   = $ImgValue->getClientOriginalExtension();
                $uploadedFile =   time() . rand(0000,9999).'.' . $getFileExt;
                $ImgValue->move($uploadDir, $uploadedFile);
                $input[$file] = $uploadedFile;
            }
        }

        $category = Category::create($input);
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
        //
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
        Category::whereId($id)->delete();
        Session::flash('success','Record Delete Successfully');
        return redirect()->route('category.index');
    }

    public function listing(){

    }
}
