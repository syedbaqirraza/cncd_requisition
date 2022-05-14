@extends('layouts.dashboard')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Requests</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">All Requests</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Request</th>
                    <th>Status</th>
                    <th>Create at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $count=1;
                    @endphp
                    @foreach ($requestData as $r)

                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$r->description}}</td>
                        <td>{{$r->status}}</td>
                        <td>{{$r->created_at}}</td>
                        <td>
                            <a role="button" class="btn btn-info float-left mr-1" href="{{route('purchase.show',['purchase'=>$r->id])}}">Check Logs</a>
                            <a role="button" class="btn btn-danger float-left mr-1" href="{{route('purchase.inventory.sendRequestToBuy',['id'=>$r->id])}}">Send Request To Buy</a>
                            @if ($r->status=='available')
                                <a role="button" class="btn btn-success float-left" href="{{route('purchase.inventory.issue',['id'=>$r->id])}}">Issue</a>
                                @else
                                <a role="button" class="btn btn-success float-left" href="{{route('purchase.inventory.available',['id'=>$r->id])}}">Available</a>
                            @endif

                        </td>
                    </tr>

                    @php
                        $count++;
                    @endphp
                    @endforeach
                </tbody>
                <tfoot>

                        <tr>
                            <th>#</th>
                            <th>Request</th>
                            <th>Status</th>
                            <th>Create at</th>
                            <th>Action</th>
                        </tr>

                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    </section>
  </div>
  @endsection

