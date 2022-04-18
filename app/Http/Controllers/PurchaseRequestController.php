<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use App\Models\PurchaseRequest;
use App\Models\RequestLog;
use App\Models\Status;
use Carbon\Carbon;
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
    public function approved($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.purchase.admin.approved',compact('request_log'));
    }

    public function reject($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.purchase.admin.reject',compact('request_log'));
    }

    public function approvedStore(Request $request)
    {
        $user_id=auth()->user()->id;
        $status_id=Status::where('name',"approved by HOD")->first();

        $user=DB::table('users')
            ->join('departments','users.dept_id','departments.id')
            ->where('departments.name','administration')
            ->select('users.id as farword_to_id')
            ->first();
        $this->validate($request,[
            'notes'=>'required',
        ]);
        RequestLog::create([
            'note'=>$request->notes,
            'request_id'=>$request->request_id,
            'status'=>$status_id->id,
            'forword_to_id'=>$user->farword_to_id,
            'forword_from_id'=>$user_id,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('purchase.index')->with('success','Request Farworded Succesfully');
    }

    public function rejectStore(Request $request)
    {
        $user_id=auth()->user()->id;
        $status_id=Status::where('name',"approved by HOD")->first();

        $user=DB::table('users')
            ->join('departments','users.dept_id','departments.id')
            ->where('departments.name','administration')
            ->select('users.id as farword_to_id')
            ->first();
        $this->validate($request,[
            'notes'=>'required',
        ]);
        RequestLog::create([
            'note'=>$request->notes,
            'request_id'=>$request->request_id,
            'status'=>$status_id->id,
            'forword_to_id'=>$user->farword_to_id,
            'forword_from_id'=>$user_id,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('purchase.index')->with('success','Request Farworded Succesfully');
    }

    public function index()
    {
        $user_id=Auth::user()->id;
        $userRole=Auth::user()->role_id;
        if($userRole=="superadmin")
        {
            $requestData=DB::table('purchase_requests')
                ->join('statuses','purchase_requests.status_id','statuses.id')
                ->select('purchase_requests.*','statuses.name as status')
                ->get();
            return view('pages.purchase.superadmin.index',compact('requestData'));
        }
        else if($userRole=="admin")
        {
            $requestData=DB::table('request_logs')
                ->join('purchase_requests','request_logs.request_id','purchase_requests.id')
                ->join('statuses','request_logs.status','statuses.id')
                ->where('request_logs.forword_to_id',$user_id)
                ->select('purchase_requests.*','statuses.name as status')
                ->get();
            return view('pages.purchase.admin.index',compact('requestData'));
        }
        else if($userRole=="user")
        {
            $requestData=DB::table('purchase_requests')
                ->where('purchase_requests.user_id',$user_id)
                ->join('statuses','purchase_requests.status_id','statuses.id')
                ->select('purchase_requests.*','statuses.name as status')
                ->get();
            return view('pages.purchase.user.index',compact('requestData'));
        }
    }
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
        // dd('ok');
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


       $data=DB::table('request_logs')
            ->join('purchase_requests','purchase_requests.id','request_logs.request_id')
            ->join('statuses','statuses.id','request_logs.status')
            ->join('users as userTo','userTo.id','request_logs.forword_to_id')
            ->join('users as userFrom','userFrom.id','request_logs.forword_from_id')
            ->where('request_logs.request_id',$id)
            ->select('request_logs.note as notes','request_logs.created_at as date_at','purchase_requests.description as item','purchase_requests.description as item','statuses.name as status','userTo.name as userToName','userFrom.name as userFromName')
            ->get();
        return view('pages.user.logs',compact('data'));
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
