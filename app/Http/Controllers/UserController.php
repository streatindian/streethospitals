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
        return view('admin.pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }

    public function listing(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table($this->table)->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('status', function ($row) {
                    return $row->status ? 'Active' : 'Inactive';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = $deleteUrl = route('user.edit', $row->id);
                    // $deleteUrl = route('speciality.destroy',$row->id);
                    $action = '<div style="display:flex;">';

                    $action .= '<a href="' . $editUrl . '" class="btn btn-primary btn-sm">Edit</a>&nbsp;';
                    $action .= '<form action="' . route('user.destroy', $row->id) . '" method="POST">
                        <input type="hidden" name="_method" value="delete" />
                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                        <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                        </form';
                    return $action;
                })
                ->escapeColumns([])
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.user.index');
    }
}
