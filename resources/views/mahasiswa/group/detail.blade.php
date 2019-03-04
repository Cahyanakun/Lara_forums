@extends('mahasiswa.layouts.app')

@section('main')
<div class="content-wrapper">
<section class="content-header">
      <h1>
        Group Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Group profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ $data->image }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $data->name }}</h3>

              <p class="text-muted text-center">{{ $data->description }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Created By </b> <a class="pull-right">{{ $data->user->name }}</a>
                </li>
                <li class="list-group-item">
                  <b>Roles </b> <a class="pull-right">{{ $data->user->role }}</a>
                </li>
                <li class="list-group-item">
                  <b>Member Group </b> <a class="pull-right">{{ $data->users->count() }}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Member List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @foreach($data->users as $member)
                <strong><i class="fa fa-book margin-r-5"></i> {{ $member->name }}</strong>
                <hr>
              @endforeach
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Files Upload</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Path</th>
                            <th>URL</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($files as $file)
                        <tr>
                            <td>{{ $file->title }}</td>
                            <td>{{ $file->filename }}</td>
                            <td>
                                <a href="{{ Storage::url($file->filename) }}">
                                    View
                                </a>
                            </td>
                            <td>{{ $file->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>

                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
</div>
@endsection

@section('main-script')
  <!-- jQuery 3 -->
<script src="{{ asset('users/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('users/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('users/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('users/dist/js/adminlte.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('users/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('users/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('users/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script>
    
</script>
@endsection


