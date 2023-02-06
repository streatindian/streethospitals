<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;

use DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('category_list')) abort(401);

        $data['category'] = Menu::where('parent_id', 0)->get();
        return view('admin.pages.menu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('category_add')) abort(401);
        $data['menu'] = Menu::get();
        $data['menu_detail'] = null;
        return view('admin.pages.menu.form', $data);
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
        ];


        $this->validate($request, $rule);
        $input = $request->all();

        $matchThese = ['id' => $request->id];
        if (isset($input['id'])) {
            unset($input['id']);
        }
        $menu = Menu::updateOrCreate($matchThese, $input);
        return redirect()->route('admin.menu.index')->with('success', 'Record ' . ($request->id ? 'Update' : 'Add') . ' Successfully');
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
        if (!auth()->user()->can('category_add')) abort(401);
        $data['menu'] = Menu::where('status', 1)->where('id', '!=', $id)->get();
        $data['menu_detail'] = Menu::findOrFail($id);
        return view('admin.pages.menu.form', $data);
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



    public function listing(Request $request)
    {
        if ($request->ajax()) {
            $type = request()->query('type') ? request()->query('type') : 'listing';
            $data = Menu::get();
            return DataTables::of($data)->addIndexColumn()

                ->editColumn('status', function ($row) {
                    return $row->status ? 'Active' : 'Inactive';
                })
                ->editColumn('icon', function ($row) {
                    return '<i class="fa '.$row->icon.'"></i>';
                })
                ->addColumn('action', function ($row) {
                    $editUrl =  route('menu.edit', $row->id);
                    $deleteUrl = route('menu.destroy', $row->id);
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

    public function destroy($id)
    {
        if (!auth()->user()->can('category_delete')) abort(401);
        Menu::whereId($id)->delete();
        Session::flash('success', 'Record Delete Successfully');
        return redirect()->route('admin.menu.index', ['type' => request()->query('type') ? request()->query('type') : 'listing']);
    }
}
