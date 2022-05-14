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
    public function itApproved($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.informationTechnology.approved',compact('request_log'));
    }
    public function itApprovedStore(Request $request)
    {
        $user_id=auth()->user()->id;

        $status_id=Status::where('name',"approved by HOD")->first();

        $user=DB::table('users')
            ->join('departments','users.dept_id','departments.id')
            ->where('departments.name','inventory')
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
        PurchaseRequest::where('id',$request->request_id)->update([
            'status_id'=>$status_id->id,
        ]);

        return redirect()->back()->with('success','Request Farworded Succesfully');
    }
    public function itReject($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.informationTechnology.reject',compact('request_log'));
    }
    public function itRejectStore(Request $request)
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
        return redirect()->route('requests.index')->with('success','Request Farworded Succesfully');
    }
    public function administrationApproved($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.administration.approved',compact('request_log'));
    }
    public function administrationApprovedStore(Request $request)
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
        PurchaseRequest::where('id',$request->request_id)->update([
            'status_id'=>$status_id->id,
        ]);

        return redirect()->back()->with('success','Request Farworded Succesfully');
    }
    public function administrationReject($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.administration.reject',compact('request_log'));
    }
    public function administrationQuotation($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.administration.quatation',compact('request_log'));
    }
    public function administrationQuatationStore(Request $request)
    {
        $user_id=auth()->user()->id;

        $status_id=Status::where('name',"quatation send")->first();

        $user=DB::table('users')
            ->join('departments','users.dept_id','departments.id')
            ->where('departments.name','finance')
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
        PurchaseRequest::where('id',$request->request_id)->update([
            'status_id'=>$status_id->id,
        ]);

        return redirect()->back()->with('success','Request Farworded Succesfully');
    }
    public function administrationRejectStore(Request $request)
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
        return redirect()->route('requests.index')->with('success','Request Farworded Succesfully');
    }
    public function callBackApproved($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.callBack.approved',compact('request_log'));
    }
    public function callBackApprovedStore(Request $request)
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
        PurchaseRequest::where('id',$request->request_id)->update([
            'status_id'=>$status_id->id,
        ]);

        return redirect()->back()->with('success','Request Farworded Succesfully');
    }
    public function callBackReject($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.callBack.reject',compact('request_log'));
    }
    public function callBackRejectStore(Request $request)
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
        return redirect()->route('requests.index')->with('success','Request Farworded Succesfully');
    }
    public function dataScienceApproved($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.dataScience.approved',compact('request_log'));
    }
    public function dataScienceApprovedStore(Request $request)
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
        PurchaseRequest::where('id',$request->request_id)->update([
            'status_id'=>$status_id->id,
        ]);

        return redirect()->back()->with('success','Request Farworded Succesfully');
    }
    public function dataScienceReject($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.dataScience.reject',compact('request_log'));
    }
    public function dataScienceRejectStore(Request $request)
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
        return redirect()->route('requests.index')->with('success','Request Farworded Succesfully');
    }
    public function departmentOfBiochemistryApproved($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.departmentOfBiochemistry.approved',compact('request_log'));
    }
    public function departmentOfBiochemistryApprovedStore(Request $request)
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
        PurchaseRequest::where('id',$request->request_id)->update([
            'status_id'=>$status_id->id,
        ]);

        return redirect()->back()->with('success','Request Farworded Succesfully');
    }
    public function departmentOfBiochemistryReject($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.departmentOfBiochemistry.reject',compact('request_log'));
    }
    public function departmentOfBiochemistryRejectStore(Request $request)
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
        return redirect()->route('requests.index')->with('success','Request Farworded Succesfully');
    }
    public function departmentOfHematologyApproved($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.departmentOfHematology.approved',compact('request_log'));
    }
    public function departmentOfHematologyApprovedStore(Request $request)
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
        PurchaseRequest::where('id',$request->request_id)->update([
            'status_id'=>$status_id->id,
        ]);

        return redirect()->back()->with('success','Request Farworded Succesfully');
    }
    public function departmentOfHematologyReject($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.departmentOfHematology.reject',compact('request_log'));
    }
    public function departmentOfHematologyRejectStore(Request $request)
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
        return redirect()->route('requests.index')->with('success','Request Farworded Succesfully');
    }
    public function departmentOfMolecularApproved($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.departmentOfMolecular.approved',compact('request_log'));
    }
    public function departmentOfMolecularApprovedStore(Request $request)
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
        PurchaseRequest::where('id',$request->request_id)->update([
            'status_id'=>$status_id->id,
        ]);

        return redirect()->back()->with('success','Request Farworded Succesfully');
    }
    public function departmentOfMolecularReject($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.departmentOfMolecular.reject',compact('request_log'));
    }
    public function departmentOfMolecularRejectStore(Request $request)
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
        return redirect()->route('requests.index')->with('success','Request Farworded Succesfully');
    }
    public function financeApproved($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.finance.approved',compact('request_log'));
    }
    public function financeApprovedStore(Request $request)
    {
        $user_id=auth()->user()->id;

        $status_id=Status::where('name',"approved by Finance")->first();

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
        PurchaseRequest::where('id',$request->request_id)->update([
            'status_id'=>$status_id->id,
        ]);

        return redirect()->back()->with('success','Request Farworded Succesfully');
    }
    public function financeApprovedQuatationStore(Request $request)
    {
        $user_id=auth()->user()->id;

        $status_id=Status::where('name',"quatation approved")->first();

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
        PurchaseRequest::where('id',$request->request_id)->update([
            'status_id'=>$status_id->id,
        ]);

        return redirect()->back()->with('success','Request Farworded Succesfully');
    }
    public function financeApprovedQuatation($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.administration.quatation',compact('request_log'));
    }
    public function financeReject($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.finance.reject',compact('request_log'));
    }
    public function financeRejectStore(Request $request)
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
        return redirect()->route('requests.index')->with('success','Request Farworded Succesfully');
    }
    public function hrApproved($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.hr.approved',compact('request_log'));
    }
    public function hrApprovedStore(Request $request)
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
        PurchaseRequest::where('id',$request->request_id)->update([
            'status_id'=>$status_id->id,
        ]);

        return redirect()->back()->with('success','Request Farworded Succesfully');
    }
    public function hrReject($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.hr.reject',compact('request_log'));
    }
    public function hrRejectStore(Request $request)
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
        return redirect()->route('requests.index')->with('success','Request Farworded Succesfully');
    }
    public function inventoryAvailable($id)
    {

        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.inventory.approved',compact('request_log'));
    }
    public function inventoryAvailableStore(Request $request)
    {
        $user_id=auth()->user()->id;

        $status_id=Status::where('name',"available")->first();
        $complete_status_id=Status::where('name',"available")->first();

        $this->validate($request,[
            'notes'=>'required',
        ]);

        RequestLog::create([
            'note'=>$request->notes,
            'request_id'=>$request->request_id,
            'status'=>$status_id->id,
            'forword_to_id'=>$user_id,
            'forword_from_id'=>$user_id,
            'created_at'=>Carbon::now(),
        ]);

        PurchaseRequest::where('id',$request->request_id)->update([
            'status_id'=>$status_id->id,
        ]);

        return redirect()->back()->with('success','Request Farworded Succesfully');
    }
    public function inventoryReject($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.inventory.reject',compact('request_log'));
    }
    public function inventoryBuyRequestStore(Request $request)
    {
        $user_id=auth()->user()->id;
        $status_id=Status::where('name',"viewed")->first();
        $user=DB::table('users')
            ->join('departments','users.dept_id','departments.id')
            ->where('departments.name','finance')
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
        PurchaseRequest::where('id',$request->request_id)->update([
            'status_id'=>$status_id->id,
        ]);
        return redirect()->back()->with('success','Request Farworded Succesfully');
    }
    public function inventoryIssue($id)
    {
        return 'ok';
    }
    public function qcApproved($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.qc.approved',compact('request_log'));
    }
    public function qcApprovedStore(Request $request)
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
        PurchaseRequest::where('id',$request->request_id)->update([
            'status_id'=>$status_id->id,
        ]);

        return redirect()->back()->with('success','Request Farworded Succesfully');
    }
    public function qcReject($id)
    {
        $request_log=DB::table('request_logs')->where('request_id',$id)->first();
        return view('pages.requests.admin.qc.reject',compact('request_log'));
    }
    public function qcRejectStore(Request $request)
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
        return redirect()->route('requests.index')->with('success','Request Farworded Succesfully');
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
            return view('pages.requests.superadmin.index',compact('requestData'));
        }

        else if($userRole=="admin")
        {
            $data=DB::table('users')->join('departments','departments.id','users.dept_id')->where('users.id',$user_id)->select('departments.name as depart_name')->first();
            if($data->depart_name=='administration')
            {
                $requestData=DB::table('purchase_requests')
                ->join('request_logs','request_logs.request_id','purchase_requests.id')
                ->join('statuses','purchase_requests.status_id','statuses.id')
                ->groupBy('request_logs.forword_to_id')
                ->having('request_logs.forword_to_id','=',$user_id)
                ->select('purchase_requests.*','statuses.name as status')
                ->get();
                return view('pages.requests.admin.administration.index',compact('requestData'));
            }
            else if($data->depart_name=='information technology')
            {
                $requestData=DB::table('request_logs')
                ->join('purchase_requests','request_logs.request_id','purchase_requests.id')
                ->join('statuses','purchase_requests.status_id','statuses.id')
                ->where('request_logs.forword_to_id',$user_id)
                ->select('purchase_requests.*','statuses.name as status')
                ->get();
                return view('pages.requests.admin.informationTechnology.index',compact('requestData'));
            }
            else if($data->depart_name=='finance')
            {
                $requestData=DB::table('purchase_requests')
                ->join('request_logs','request_logs.request_id','purchase_requests.id')
                ->join('statuses','purchase_requests.status_id','statuses.id')
                ->groupBy('request_logs.forword_to_id')
                ->having('request_logs.forword_to_id','=',$user_id)
                ->select('purchase_requests.*','statuses.name as status')
                ->get();
                return view('pages.requests.admin.finance.index',compact('requestData'));
            }
            else if($data->depart_name=='HR')
            {
                $requestData=DB::table('request_logs')
                ->join('purchase_requests','request_logs.request_id','purchase_requests.id')
                ->join('statuses','purchase_requests.status_id','statuses.id')
                ->where('request_logs.forword_to_id',$user_id)
                ->select('purchase_requests.*','statuses.name as status')
                ->get();
                return view('pages.requests.admin.hr.index',compact('requestData'));
            }
            else if($data->depart_name=='data science')
            {
                $requestData=DB::table('request_logs')
                ->join('purchase_requests','request_logs.request_id','purchase_requests.id')
                ->join('statuses','purchase_requests.status_id','statuses.id')
                ->where('request_logs.forword_to_id',$user_id)
                ->select('purchase_requests.*','statuses.name as status')
                ->get();
                return view('pages.requests.admin.dataScience.index',compact('requestData'));
            }
            else if($data->depart_name=='call back')
            {
                $requestData=DB::table('request_logs')
                ->join('purchase_requests','request_logs.request_id','purchase_requests.id')
                ->join('statuses','purchase_requests.status_id','statuses.id')
                ->where('request_logs.forword_to_id',$user_id)
                ->select('purchase_requests.*','statuses.name as status')
                ->get();
                return view('pages.requests.admin.callBack.index',compact('requestData'));
            }
            else if($data->depart_name=='department of hematology')
            {
                $requestData=DB::table('request_logs')
                ->join('purchase_requests','request_logs.request_id','purchase_requests.id')
                ->join('statuses','purchase_requests.status_id','statuses.id')
                ->where('request_logs.forword_to_id',$user_id)
                ->select('purchase_requests.*','statuses.name as status')
                ->get();
                return view('pages.requests.admin.departmentOfHematology.index',compact('requestData'));
            }
            else if($data->depart_name=='department of molecular')
            {
                $requestData=DB::table('request_logs')
                ->join('purchase_requests','request_logs.request_id','purchase_requests.id')
                ->join('statuses','purchase_requests.status_id','statuses.id')
                ->where('request_logs.forword_to_id',$user_id)
                ->select('purchase_requests.*','statuses.name as status')
                ->get();
                return view('pages.requests.admin.departmentOfMolecular.index',compact('requestData'));
            }
            else if($data->depart_name=='department of biochemistry')
            {
                $requestData=DB::table('request_logs')
                ->join('purchase_requests','request_logs.request_id','purchase_requests.id')
                ->join('statuses','purchase_requests.status_id','statuses.id')
                ->where('request_logs.forword_to_id',$user_id)
                ->select('purchase_requests.*','statuses.name as status')
                ->get();
                return view('pages.requests.admin.departmentOfBiochemistry.index',compact('requestData'));
            }
            else if($data->depart_name=='QC')
            {
                $requestData=DB::table('request_logs')
                ->join('purchase_requests','request_logs.request_id','purchase_requests.id')
                ->join('statuses','purchase_requests.status_id','statuses.id')
                ->where('request_logs.forword_to_id',$user_id)
                ->select('purchase_requests.*','statuses.name as status')
                ->get();
                return view('pages.requests.admin.qc.index',compact('requestData'));
            }
            else if($data->depart_name=='inventory')
            {

                $requestData=DB::table('purchase_requests')
                ->join('request_logs','request_logs.request_id','purchase_requests.id')
                ->join('statuses','purchase_requests.status_id','statuses.id')
                ->groupBy('request_logs.forword_to_id')
                ->having('request_logs.forword_to_id','=',$user_id)
                ->select('purchase_requests.*','statuses.name as status')
                ->get();
                return view('pages.requests.admin.inventory.index',compact('requestData'));
            }

        }

        else if($userRole=="user")
        {
            $requestData=DB::table('purchase_requests')
                ->join('statuses','purchase_requests.status_id','statuses.id')
                ->where('purchase_requests.user_id',$user_id)
                ->select('purchase_requests.*','statuses.name as status')
                ->get();

            return view('pages.requests.user.index',compact('requestData'));
        }

    }
    public function create()
    {
        $data=Status::where('name','open')->first();
        $status_id=$data->id;
        $user_id=Auth::user()->id;
        return view('pages.requests.user.add',compact('status_id','user_id'));
    }
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
        return view('pages.logs.user.index',compact('data'));
    }
    public function edit($id)
    {
        $request=PurchaseRequest::find($id);
        return view('pages.user.edit',compact('request'));
    }
    public function update(Request $request,$id)
    {
        PurchaseRequest::where('id',$id)->update(['description'=>$request->description]);
        return back()->with('success','Update Request Successfully');
    }
    public function destroy($id)
    {
        PurchaseRequest::where('id',$id)->delete();
        RequestLog::where('request_id',$id)->delete();
        return back()->with('success','Request Deleted Successfullly');
    }
}
