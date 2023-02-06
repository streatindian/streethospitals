<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use DataTables;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!auth()->user()->can('role_list')) abort(401);
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('admin.pages.roles.index', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('role_add')) abort(401);
        $permissions = Permission::get();
        return view('admin.pages.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('role_add')) abort(401);
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            // 'permission' => 'required',
        ]);

        $role = Role::create(['name' => str_replace(' ','_',strtolower(trim($request->get('name'))))]);
        $role->syncPermissions($request->get('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        if (!auth()->user()->can('role_view')) abort(401);
        $role = $role;
        $rolePermissions = $role->permissions;

        return view('admin.pages.roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if (!auth()->user()->can('role_edit')) abort(401);
        $role = $role;
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $permissions = Permission::get();

        return view('admin.pages.roles.edit', compact('role', 'rolePermissions', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role, Request $request)
    {
        if (!auth()->user()->can('role_edit')) abort(401);
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role->update($request->only('name'));

        $role->syncPermissions($request->get('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if (!auth()->user()->can('role_delete')) abort(401);
        $role->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }

    public function listing(Request $request)
    {
        if (!auth()->user()->can('role_list')) abort(401);
        if ($request->ajax()) {
            $data = Role::all();
            return DataTables::of($data)->addIndexColumn()
            ->editColumn('name',function($row){
                return '<span style="text-transform:capitalize;">'.str_replace('_',' ',$row->name).'</span>';
            })
                ->addColumn('action', function ($row) {
                    $editUrl = route('roles.edit', $row->id);
                    $deleteUrl  = route('roles.destroy', $row->id);
                    $viewUrl = route('roles.show', $row->id);
                    $action = '<div style="display:flex;">';

                    $action = '<div style="display:flex;">';
                    if (auth()->user()->can('role_edit')) {
                        $action .= view('components.edit', ['url' => $editUrl]);
                    }
                    if (auth()->user()->can('role_view')) {
                        $action .= view('components.view', ['url' => $editUrl]);
                    }
                    if (auth()->user()->can('role_delete')) {
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
