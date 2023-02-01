<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\City;
use Illuminate\Support\Facades\Hash;
use App\Models\State;

class UserController extends Controller
{
    public $table = 'users';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('user_list')) abort(401);
        return view('admin.pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('user_add')) abort(401);
        $data['user'] = null;
        $data['country'] = Country::all();
        $data['roles'] = Role::all();
        return view('admin.pages.user.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request)
    {
        if (!auth()->user()->can('user_add')) abort(401);
        //For demo purposes only. When creating user or inviting a user
        // you should create a generated random password and email it to the user
        $user->create(array_merge($request->validated(), [
            'password' => Hash::make($request->password)
        ]));
        $user->syncRoles($request->get('role'));

        return redirect()->route('user.index')
            ->withSuccess(__('User created successfully.'));
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
    public function edit(User $user)
    {
        if (!auth()->user()->can('user_edit')) abort(401);
        // dd(State::where('country_id', $user->country)->get());
        return view('admin.pages.user.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get(),
            'country' => Country::all(),
            'state' => State::where('country_id', $user->country)->get(),
            'city' => City::where('state_id', $user->state)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        if (!auth()->user()->can('user_edit')) abort(401);
        // dd(request()->route('user'));
        // dd($request->all());
        // dd($request->validated());
        $user->update($request->all());

        $user->syncRoles($request->get('role'));

        return redirect()->route('user.index')
            ->withSuccess(__('User updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!auth()->user()->can('user_delete')) abort(401);
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }

    public function listing(Request $request)
    {
        if (!auth()->user()->can('user_list')) abort(401);
        if ($request->ajax()) {
            $data = DB::table($this->table)->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('status', function ($row) {
                    return $row->status ? 'Active' : 'Inactive';
                })
                ->addColumn('action', function ($row) {
                    $editUrl =  route('user.edit', $row->id);
                    $deleteUrl = route('user.destroy',$row->id);
                    $action = '<div style="display:flex;">';

                    $action = '<div style="display:flex;">';
                    if (auth()->user()->can('user_edit')) {
                        $action .= view('components.edit', ['url' => $editUrl]);
                    }
                    if (auth()->user()->can('user_delete')) {
                        $action .= view('components.delete', ['url' => $deleteUrl]);
                    }
                    $action .= '</div>';
                    return $action;
                })
                ->escapeColumns([])
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.user.index');
    }
}
