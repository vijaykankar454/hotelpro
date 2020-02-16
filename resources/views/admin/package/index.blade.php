@extends('layouts.backend_layout.admin_template')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('View Package') }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
          <li class="breadcrumb-item active"> {{ __('View Package') }}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<!-- Main content -->
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
    @if (session()->has('succmessage'))
      <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a><h4 class="alert-heading">Success!</h4>
      {{ session('succmessage') }} </div>
    @endif
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">View Package</h3>
            <a href='{{route('admin.package.packageadd')}}' class="btn btn-sm btn-primary pull-left delete_all" style='float:right;' >Add Package</a>
        </div>
        <!-- /.card-header --> 
        {!! Form::open(['method'=>'POST', 'url'=> route('admin.package.deleteall'), 'id'=>'myForm']) !!}
          
        <div class="card-body"><a class="btn btn-primary btn-sm pull-left delete_all" style='float:right;color:white;' onclick="return deleteAllRecord();">Delete Selected </a>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th><input type="checkbox" name="" id="masterchk" value=""></th>
            
              <th>Photo</th>
              <th>Package name</th>
              <th>Destination Name</th>
              <th>Total <br>Registerted <br>People</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @if(!empty(count($packageData)))
                @foreach($packageData as $data)
                  <tr>
                    <td><input type="checkbox" name="packageid[]" class="sub_chk" value="{{$data->id}}"></td>
                   
                    <td>
                      @if($data->photo)
                      <img height="100" src="{{$data->photo}}" alt="">
                      @else
                      no image
                      @endif
                    </td>
                    <td>{{$data->v_name}}</td>
                    <td> {{$data->destination->v_name}} 
                    </td>
                    <td>2
                    </td>
                    <td>{!!$data->package_status!!}</td>
                      <td>{{$data->created_at}}</td>
                    
                    <td>
                    
                      <a href="{{route('admin.package.packageedit',$data->id)}}" class="btn btn-info btn-sm">Edit</a>  
                      <a href="#;" class="btn btn-danger btn-sm" onclick="deleteRecord('{{route('admin.package.recdelete',$data->id)}}')">Delete</a>
                      @if($data->i_status==1)
                        <a href="#;" onclick="activeRecord('{{route('admin.package.recupdatestatus',[$data->id,0])}}')" class="btn btn-success btn-sm">Inactive</a></td>
                      @else 
                      <a href="#;" onclick="activeRecord('{{route('admin.package.recupdatestatus',[$data->id,1])}}')" class="btn btn-warning btn-sm">Active</a></td>  
                      @endif
                  </tr>
                @endforeach
              @else
					      <tr >
					      <td class="center" colspan=8 style='text-align:center;'>No Record Found</td></tr>
				      @endif
           
            </tbody>
            <tfoot>
              <tr>
                <th></th>
               
                <th>Photo</th>
                <th>Package name</th>
                <th>Destination Name</th>
                <th>Total Registerted People</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
        {!! Form::close() !!}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

@endsection
@push('js')
<script src="{{ asset('js/backend_js/jquery-validation/alter.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable({
    'order': [],
    'columnDefs': [ {
    'targets': [0,1,7], /* column index */
    'orderable': false, /* true or false */
    }]
    });
  });

</script>
@endpush