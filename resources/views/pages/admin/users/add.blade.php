@extends('layouts.dashboard')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Request Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Request Add</li>
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
                  <h3 class="card-title">Add Request Form</h3>
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
                <form action="{{route('purchase.store')}}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Write Your Request</label>
                      <textarea name="description" row='20' class="form-control" placeholder="request description"></textarea>
                    </div>
                    <input type="hidden" name="status_id" value="{{$status_id}}">
                    <input type="hidden" name="user_id" value="{{$user_id}}">

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

