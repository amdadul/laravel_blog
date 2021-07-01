<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:role.index|role.create|role.edit|role.delete', ['only' => ['index','show']]);
        $this->middleware('permission:role.create', ['only' => ['create','store']]);
        $this->middleware('permission:role.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['roles'] = Role::all();
        $data['admins'] = User::all();
        return view('admin.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles'] = Role::all();
        return view('admin.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usr = new User();

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',

        ]);

        $usr->name = $request->name;
        $usr->email = $request->email;
        $usr->password = bcrypt($request->password);
        $usr->status = "active";
        $usr->role = "Admin";

        if($usr->save())
        {
            if($request->roles)
            {
                $usr->assignRole($request->roles);
            }
            session()->flash('success','Admin Created Successfully');
        }
        else{
            session()->flash('warning','Error Ocured');
        }
        return redirect()->back();
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
        $data['roles'] = Role::all();
        $data['admin'] = User::find($id);
        return view('admin.create',$data);
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
        $usr = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'nullable|min:8|confirmed',

        ]);

        $usr->name = $request->name;
        $usr->email = $request->email;
        if($request->password)
        {
            $usr->password = bcrypt($request->password);
        }

        if($usr->save())
        {
            $usr->roles()->detach();
            if($request->roles)
            {
                $usr->assignRole($request->roles);
            }
            session()->flash('success','Admin Updated Successfully');
        }
        else{
            session()->flash('warning','Error Ocured');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
