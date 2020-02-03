@extends('layouts.backend_layout.admin_template')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('Static Pages') }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
          <li class="breadcrumb-item active"> {{ __('Static pages') }}</li>
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

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Main Pages</h3><a href='{{route('admin.pageadd')}}' class="btn btn-sm btn-primary pull-left delete_all" style='float:right;' >Add Sub Pages</a>
        </div>
        <!-- /.card-header --> 
        <div class="card-body"><input  type="submit" class="btn btn-primary btn-sm pull-left delete_all" style='float:right;' value='Delete Selected' onclick="return deleteAllRecord();">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th><input type="checkbox" name="" id="masterchk" value=""></th>
              <th>Page /Menu Title</th>
              <th>Order</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="checkbox" name="" class="sub_chk" value=""></td>
                <td>Internet
                  Explorer 5.0
                </td>
                <td>Win 95+</td>
                <td>5</td>
                <td><span class="badge badge-success">Active</span></td>
                <td>
                  <a href="#;" class="btn btn-info btn-sm">Edit</a>  
                  <a href="#;" class="btn btn-danger btn-sm" onclick="deleteRecord()">Delete</a>
                  <a href="#;" onclick="activeRecord();" class="btn btn-primary btn-sm">Active</a></td>
              </tr>
            <tr>
              <td><input type="checkbox" name="" class="sub_chk" value=""></td>
              <td>Internet
                Explorer 5.0
              </td>
              <td>Win 95+</td>
              <td>5</td>
              <td><span class="badge badge-danger">Inactive</span></td>
              <td>
                <a href="#;" class="btn btn-success">Edit</a>  
                <a href="#;" class="btn btn-danger" onclick="deleteRecord()">Delete</a>
                <a href="#;" onclick="activeRecord();" class="btn btn-warning">Active</a></td>
            </tr>
           
            </tbody>
            <tfoot>
              <tr>
                <th><input type="checkbox" name="" id="masterchk" value=""></th>
                <th>Page /Menu Title</th>
                <th>Order</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
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
<script>
  $('#masterchk').on('click', function(e) {
    if($(this).is(':checked',true))  
    {
      $(".sub_chk").prop('checked', true);  
    }  
    else  
    {  
      $(".sub_chk").prop('checked',false);  
    }  
  });
  function deleteRecord(){

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this record!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href="{{ url('/')}}/pagemanager/delete/"+id;
      } else {
        swal("Your data is safe!");
      }
    });
    
  }
  function activeRecord(){

    swal({
      title: "Are you sure?",
      buttons: true,
   
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href="{{ url('/')}}/pagemanager/delete/"+id;
      } else {
        swal("Your data is safe!");
      }
    });
    
  }
  function deleteAllRecord(id){
    var allVals = [];  
		$(".sub_chk:checked").each(function() {  
			allVals.push($(this).attr('data-id'));
		});  
		//alert(allVals.length); return false;  
		if(allVals.length <=0)  
		{  
      swal({
        text: "Please Select Atleast 1 Record",
        buttons: false,
        dangerMode: false,
      })
     
    }else{
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href="{{ url('/')}}/pagemanager/delete/"+id;
        } else {
          swal("Your data is safe!");
        }
      });

    }
    
  }

  $(function () {
    $('#example1').DataTable({
    'order': [],
    'columnDefs': [ {
    'targets': [0,1,4], /* column index */
    'orderable': false, /* true or false */
    }]
    });
  });
</script>
@endpush