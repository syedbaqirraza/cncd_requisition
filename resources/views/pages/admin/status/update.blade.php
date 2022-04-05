@extends('layouts.dashboard')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Status Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Update Status</li>
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
                  <h3 class="card-title">Update Status Form</h3>
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
                <form action="{{route('status.update',['status'=>$status->id])}}" method="post">
                    @csrf
                    @method("PUT")
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Status Name</label>
                      <input type="name" name="name" class="form-control" value="{{$status->name}}">
                    </div>
                  </div>

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

