<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
       $department=Department::all();
       return view('pages.admin.department.index',compact('department'));
    }

    public function create()
    {
        return view('pages.admin.department.add');
    }


    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required',
            ]
        );
        Department::create($request->all());
        return back()->with('success','Department Added Successfullly');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $department=Department::find($id);
        return view('pages.admin.department.update',compact('department'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);
        Department::where('id',$id)->update(['name'=>$request->name]);
        return back()->with('success','Department Updated');

    }

    public function destroy($id)
    {
        Department::destroy($id);
        return back()->with('success','Department Deleted Successfully');
    }
}
