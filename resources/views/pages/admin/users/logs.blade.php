@extends('layouts.dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Request Log</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Request Logs</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <h1 class="text-center">Request for: {{$data[0]->item}}</h1>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @foreach ($data as $d)
                <div class="row">
                    <div class="col-md-12">
                        <div class="timeline">
                            <div class="time-label">
                                <span class="bg-red">{{ \Carbon\Carbon::parse($d->date_at)->format('M-d-Y H:i A')}}</span>
                            </div>
                            <div>
                                <i class="fas fa-user bg-green"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header">Farword From To:- {{$d->userFromName}} <i class="fa fa-arrow-right"></i> {{$d->userToName}}</h3>

                                    <div class="timeline-body">
                                       Note:- {{$d->notes}}
                                    </div>
                                    <div class="timeline-footer">
                                      Status:-  <a class="btn btn-primary btn-sm">{{$d->status}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
