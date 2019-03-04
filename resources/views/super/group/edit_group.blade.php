@extends('super.layouts.app')

@section('main')
<div class="content-wrapper">
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Group Portal</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <div>
          @if (count($errors) > 0)
              @foreach ($errors->all() as $error)
              <p class="alert alert-danger">{{ $error }}</p>
              @endforeach
            @endif
          </div>
          <div class="row">
            <div class="col-md-6">
           
            <form action="{{ route('group.update', $group->id)}}" method="post" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PUT">
              {{ csrf_field()}}

              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="title" value="{{ $group->name }}" class="form-control" required>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Cover Group</label>
                <img src="{{ $group->image }}" alt="" style="width:100px; height:100px;">
                <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Member</label>
                <select name="users[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Member"
                        style="width: 100%;" required>
                  @foreach($users as $us)
                        <option value="{{ $us->id }}"
                          @foreach($group->users as $cats)
                            @if($cats->id == $us->id)
                              selected
                            @endif
                          @endforeach
                        >{{ $us->name }}</option>
                  @endforeach
                </select>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label>Dscription</label>
                <input type="text" name="description" id="description" value="{{ $group->description }}" class="form-control" required>
              </div>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
  
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </div>

         

          </form>
        </div>
      </div>
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
<!-- Select2 -->
<script src="{{ asset('users/select2/dist/js/select2.full.min.js')}}"></script>
<!-- ck edior -->
<script src="{{ asset('users/ckeditor/ckeditor.js')}}"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script>
     //Initialize Select2 Elements
    // $('#category').select2();
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    $(function() {
      $('.select2').select2(); 

      CKEDITOR.replace('editor1', options);
    });

    
</script>
@endsection