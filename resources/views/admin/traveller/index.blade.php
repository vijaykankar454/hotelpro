@extends('layouts.backend_layout.admin_template')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('View Travellers') }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
          <li class="breadcrumb-item active"> {{ __('View Travellers') }}</li>
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
          <h3 class="card-title">Travellers List</h3>
        
        </div>
        <!-- /.card-header --> 
        {!! Form::open(['method'=>'POST', 'url'=> route('admin.traveller.deleteall'), 'id'=>'myForm']) !!}
          
        <div class="card-body"><a class="btn btn-primary btn-sm pull-left delete_all" style='float:right;color:white;' onclick="return deleteAllRecord();">Delete Selected </a>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th><input type="checkbox" name="" id="masterchk" value=""></th>
              <th>Traveller Name</th>
              <th>Email,<br>Phone</th>
              <th>City ,<br>State ,<br>Country</th>
              <th>Address</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @if(!empty(count($userData)))
                @foreach($userData as $user)
                  <tr>
                    <td><input type="checkbox" name="traveller_id[]" class="sub_chk" value="{{$user->id}}"></td>
                    <td>
                      {{$user->name}}  
                   
                    </td>
                    <td> {{$user->email}},<br> {{$user->phone}}</td>
                    <td>{{$user->city}},<br> {{$user->state}}, <br> {{$user->country}}</td>
                    <td>{{$user->	address}}</td>
                    <td>{!!$user->travller_status!!}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                    
                      <a href="#;" class="btn btn-danger btn-sm" onclick="deleteRecord('{{route('admin.traveller.travellerdelete',$user->id)}}')">Delete</a>
                      @if($user->status==1)
                        <a href="#;" onclick="activeRecord('{{route('admin.traveller.updatestatus',[$user->id,0])}}')" class="btn btn-success btn-sm">Inactive</a></td>
                      @else 
                      <a href="#;" onclick="activeRecord('{{route('admin.traveller.updatestatus',[$user->id,1])}}')" class="btn btn-warning btn-sm">Active</a></td>  
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
                <th>Traveller Name</th>
                <th>Email,<br>Phone</th>
                <th>City ,<br>State ,<br>Country</th>
                <th>Address</th>
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
    'targets': [0,7], /* column index */
    'orderable': false, /* true or false */
    }]
    });
  });

</script>
@endpush