@extends('layouts.dashboard')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">All Users</li>
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
                    <th>Name</th>
                    <th>Email </th>
                    <th>Role </th>
                    <th>Department</th>
                    <th>Create At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $count=1;
                    @endphp
                    @foreach ($user as $u)
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->r_name}}</td>
                        <td>{{$u->d_name}}</td>
                        <td>{{$u->created_at}}</td>
                        <td>
                            @if ($u->status==1)
                                <form action="{{route('user.status.update',['id'=>$u->id])}}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" value="0" name="status">
                                    <button class="btn btn-success float-left"  type="submit">Active</button>
                                </form>
                            @else
                                <form action="{{route('user.status.update',['id'=>$u->id])}}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" value="1" name="status">
                                    <button class="btn btn-danger float-left"  type="submit">Deactive</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            {{-- <button class="btn btn-success float-left" onclick="window.location.href='{{url('user/'.$u->id.'/edit')}}'" >Edit</button> --}}
                            <form action="{{url('user/'.$u->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger float-left"  type="submit">Delete</button>
                            </form>
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
                        <th>Name</th>
                        <th>Email </th>
                        <th>Role </th>
                        <th>Department</th>
                        <th>Create At</th>
                        <th>Status</th>
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

