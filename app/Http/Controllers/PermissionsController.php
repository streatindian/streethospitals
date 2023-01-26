<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use DataTables;
class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.pages.permissions.index', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show form for creating permissions
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \IllumPermissionsControllerinate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name'
        ]);

        Permission::create($request->only('name'));

        return redirect()->route('permissions.index')
            ->withSuccess(__('Permission created successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('admin.pages.permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id
        ]);

        $permission->update($request->only('name'));

        return redirect()->route('permissions.index')
            ->withSuccess(__('Permission updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')
            ->withSuccess(__('Permission deleted successfully.'));
    }


    public function listing(Request $request)
    {
        if ($request->ajax()) {
            $data = Permission::all();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('name', function ($row) {
                    return '<span style="text-transform:capitalize;">' . str_replace('.', ' ', $row->name) . '</span>';
                })
                ->addColumn('action', function ($row) {
                    $action = '<div style="display:flex;">';
                    // $action .=    '<a class="btn btn-info btn-sm"
                    //     href="' . route('permissions.show', $row->id) . '">Show</a>&nbsp;';
                    $action .=    '<a class="btn btn-primary btn-sm" href="' . route('permissions.edit', $row->id) . '">Edit</a>&nbsp;';
                    $action .= '<form action="' . route('permissions.destroy', $row->id) . '" method="POST  ">
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
}
