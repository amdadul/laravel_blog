<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('auth.register',compact('roles'));
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
            'password' => 'required|min:8',
            'image' => 'mimes:jpg,jpeg,png,webp',
        ]);

        $usr->name = $request->name;
        $usr->email = $request->email;
        $usr->password = bcrypt($request->password);
        $usr->status = "active";
        $usr->role = "user";

        if($request->hasFile('image'))
        {
            $file   = $request->file('image');
            $path   = 'images/upload/users';
            $file_name = time().rand(00,99).'.'.$file->getClientOriginalName();
            $file->move($path,$file_name);
            $usr->image = $path. '/' .$file_name;
        }
        else
        {
            $usr->image = 'images/upload/users/noimage.png';
        }

        if($usr->save())
        {
            session()->flash('success','Account Created Successfully');
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
        //
    }
}
