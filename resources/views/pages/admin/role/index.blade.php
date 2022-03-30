@extends('layouts.dashboard')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">All Role</li>
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
                  <th>Role Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                    @php
                        $count=1;
                    @endphp

                    @foreach ($role as $r)
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$r->name}}</td>
                        <td>
                            <button class="btn btn-success float-left" onclick="window.location.href='{{url('roles/'.$r->id.'/edit')}}'" >Edit</button>
                            <form action="{{url('roles/'.$r->id)}}" method="post">
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
                        <th>Menu NAme</th>
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

