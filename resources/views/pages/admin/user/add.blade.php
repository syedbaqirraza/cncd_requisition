@extends('layouts.dashboard')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">User Status</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6 offset-md-3">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add User Form</h3>
                </div>
                @if($errors->any())
                <div class="alert alert-danger">

                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif



                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Name</label>
                      <input type="name" name="name" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Departmant</label>
                      <select type="name" name="dept_id" class="form-control">
                        <option value="">choose</option>
                          @foreach ($dept as $d)
                          <option value="{{$d->id}}">{{$d->name}}</option>
                          @endforeach

                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Role</label>
                      <select type="name" name="role_id" class="form-control">
                        <option value="">choose</option>
                          @foreach ($roles as $r)
                          <option value="{{$r->id}}">{{$r->name}}</option>
                          @endforeach

                      </select>
                    </div>
                    <input type="hidden" name="status" value="1">

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  @endsection

