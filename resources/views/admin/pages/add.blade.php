@extends('layouts.backend_layout.admin_template')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('Add Pages') }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
          <li class="breadcrumb-item active"> <a href="#">{{ __('Static pages') }} </a></li>
          <li class="breadcrumb-item active"> {{ __('Add  pages') }}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<!-- Main content -->
<!-- Main content -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row" >
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Page</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="http://hotel.dev/admin/login" accept-charset="UTF-8" aria-label="Login">
            <div class="card-body col-md-8" >
              <div class="form-group">
                <label for="v_name">Page/Menu Name</label>
                <input type="text" name="v_name" required="required" class="form-control" id="v_name" placeholder="Page Name">
              </div>
              <div class="form-group">
                <label for="v_title">Page Title</label>
                <input type="text" name="v_title" required class="form-control" id="v_title" placeholder="Page Title">
              </div>
            
              <div class="form-group">
                <label for="v_desc">Description</label>
                <textarea  class="form-control" name="v_desc" id="v_desc"  ></textarea>
              </div>
              <div class="form-group">
                <label for="v_metatitle">Meta TItle</label>
                <textarea  class="form-control" placeholder="Meta TItle" name="v_metatitle" id="v_metatitle" required></textarea>
              </div>
              
              <div class="form-group">
                <label for="v_metadescription">Meta Description</label>
                <textarea  class="form-control" placeholder="Meta Description" name="v_metadescription" id="v_metadescription" required></textarea>
              </div>
  
              <div class="form-group">
                <label for="v_metakeyword">Meta Keyword</label>
                <textarea  class="form-control" placeholder="Meta Keyword" name="v_metakeyword" id="v_metakeyword" required></textarea>
              </div>

              <div class="form-group">
                <label for="i_order">Order</label>
                <input  type="text" class="form-control" name="i_order" id="i_order" value="0" maxlength="3" style='width:70px;' placeholder="Order">
              </div>
             
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
  CKEDITOR.replace( 'v_desc',{
    filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
} );
</script>
@endpush