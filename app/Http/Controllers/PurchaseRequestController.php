<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use App\Models\PurchaseRequest;
use App\Models\RequestLog;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Phar;

class PurchaseRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $requestData=DB::table('purchase_requests')
            ->where('purchase_requests.user_id',$user_id)
            ->join('statuses','purchase_requests.status_id','statuses.id')
            ->select('purchase_requests.*','statuses.name as status')
            ->get();
        return view('pages.user.index',compact('requestData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Status::where('name','open')->first();
        $status_id=$data->id;
        $user_id=Auth::user()->id;
        return view('pages.user.add',compact('status_id','user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userDeprt=Auth::user()->dept_id;

        $forword_from_id=Auth::user()->id;

        $roles=DB::table('roles')->where('name','admin')->first();

        $forword_to_id=DB::table('users')->where('role_id',$roles->id)->first();



        $this->validate($request,[
            'description'=>'required',
            'status_id'=>'required',
            'user_id'=>'required',
        ]);

        $request_id=PurchaseRequest::create($request->all())->id;

        RequestLog::create([
            'request_id'=>$request_id,
            'status'=>$request->status_id,
            'forword_to_id'=>$forword_to_id->id,
            'forword_from_id'=>$forword_from_id,
            'note'=>'Generate Request'
        ]);

        return back()->with('success','Request Added Successfullly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // DB::table('purchase_requests')->join();
        return view('pages.user.logs');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request=PurchaseRequest::find($id);
        return view('pages.user.edit',compact('request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        PurchaseRequest::where('id',$id)->update(['description'=>$request->description]);
        return back()->with('success','Update Request Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PurchaseRequest::where('id',$id)->delete();
        RequestLog::where('request_id',$id)->delete();
        return back()->with('success','Request Deleted Successfullly');
    }
}
