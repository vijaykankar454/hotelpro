@extends('layouts.backend_layout.admin_template')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('View Payments') }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
          <li class="breadcrumb-item active"> {{ __('View Payments') }}</li>
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
          <h3 class="card-title">Payment List</h3>
        
        </div>
        <!-- /.card-header --> 
        {!! Form::open(['method'=>'POST', 'url'=> route('admin.payment.deleteall'), 'id'=>'myForm']) !!}
          
        <div class="card-body"><a class="btn btn-primary btn-sm pull-left delete_all" style='float:right;color:white;' onclick="return deleteAllRecord();">Delete Selected </a>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th><input type="checkbox" name="" id="masterchk" value=""></th>
              <th>Payment Date</th>
              <th>Package</th>
              <th>Destination</th>
              <th>Payment Method</th>
              <th>Payment Status</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @if(!empty(count($PaymentData)))
                @foreach($PaymentData as $data)
                  <tr>
                    <td><input type="checkbox" name="payment_id[]" class="sub_chk" value="{{$data->id}}"></td>
                    <td>
                      {{$data->payment_date}}  
                   
                    </td>
                    <td>  {{$data->package->v_name}}
                    </td>
                    <td>{{$data->audioFiles->v_heading}}
                    </td>
                    <td>
                      {{$data->payment_method}}
                    </td>
                    <td>{{$data->payment_status}}
                      
                    </td>
                    <td>{{$data->created_at}}

                    </td>
                    <td>
                    
                      <a href="#;" class="btn btn-danger btn-sm" onclick="deleteRecord('{{route('admin.payment.paymentdelete',$data->id)}}')">Delete</a>
                    
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
                <th>Payment Date</th>
                <th>Package</th>
                <th>Destination</th>
                <th>Payment Method</th>
                <th>Payment Status</th>
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