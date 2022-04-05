<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=DB::table('users')
        ->join('roles','roles.id','users.role_id')
        ->join('departments','departments.id','users.dept_id')
        ->select('users.*','roles.name as r_name','departments.name as d_name')
        ->get();
        return view('pages.admin.user.index',compact('user'));
    }
    public function statusUpdate(Request $request,$id)
    {
        // dd($request->status);
        DB::table('users')->where('id',$id)->update(['status'=>$request->status]);

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        $dept=Department::all();
        return view('pages.admin.user.add',compact('roles','dept'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role_id'=>'required',
            'status'=>'required',
        ]
    );

        $request['password']=Hash::make($request->password);


    User::create($request->all());
    return back()->with('success','User Added Successfullly');
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
        $user=User::find($id);

        return view('pages.admin.user.update',compact('user'));
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
        $this->validate($request,[
            'name'=>'required'
        ]);
        $menu=User::where('id',$id)->update(['name'=>$request->name]);
        return back()->with('success','User Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return back()->with('success','User Deleted Successfully');
    }
}
