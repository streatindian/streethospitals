<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Session;
class SpecialityController extends Controller
{
    public $table = 'specialities';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.pages.speciality.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['speciality'] = null;
        return view('admin.pages.speciality.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, ['name' => 'required|unique:specialities,name,'.$request->id, 'status' => 'required']);

        $matchThese = ['id' => $request->id];
        $input = $request->all();
        if (isset($input['id'])) {
            unset($input['id']);
        }
        $speciality = Speciality::updateOrCreate($matchThese, $input);
        return redirect()->route('speciality.index')->with('Recoard Add Successfully');
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
        $data['speciality'] = DB::table($this->table)->whereId($id)->first();
        return view('admin.pages.speciality.form',$data);
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
        DB::table($this->table)->whereId($id)->delete();
        Session::flash('success','Record Delete Successfully');
        return redirect()->route('speciality.index');
    }

    public function listing(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table($this->table)->select('id', 'name', 'status')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = $deleteUrl = route('speciality.edit', $row->id);
                    // $deleteUrl = route('speciality.destroy',$row->id);
                    $action = '<div>';

                    $action .= '<a href="' . $editUrl . '" class="btn btn-primary btn-sm">Edit</a>&nbsp;';
                    $action .= '<form action="' . route('speciality.destroy', $row->id) . '" method="POST">
                        <input type="hidden" name="_method" value="delete" />
                        <input type="hidden" name="_token" value="'.csrf_token() .'">
                        <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                        </form';
                    return $action;
                })
                ->escapeColumns([])
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
