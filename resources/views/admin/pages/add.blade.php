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
          {!! Form::open(['method'=>'GET', 'url'=> route('admin.pageadd'), 'name'=>'add_page', 'id'=>'add_page','novalidate'=>'novalidate']) !!}
            <div class="card-body col-md-8" >
              <div class="form-group">
                {!! Form::label('v_name', 'Page/Menu Name') !!}
                {!! Form::text('v_name', null, ['class'=>'form-control','id'=>'v_name','placeholder'=>'Page Name'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('v_title', 'Page Title') !!}
                {!! Form::text('v_title', null, ['class'=>'form-control','id'=>'v_title','placeholder'=>'Page Title'])!!}
              </div>
            
              <div class="form-group">
                {!! Form::label('v_desc', 'Description') !!}
                {!! Form::textarea('v_desc', null, ['class'=>'form-control','id'=>'v_desc'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('v_metatitle', 'Meta TItle') !!}
                {!! Form::textarea('v_metatitle', null, ['class'=>'form-control','id'=>'v_metatitle','placeholder'=>'Meta TItle'])!!}
             </div>
              
              <div class="form-group">
                {!! Form::label('v_metadescription', 'Meta Description') !!}
                {!! Form::textarea('v_metadescription', null, ['class'=>'form-control','id'=>'v_metadescription','placeholder'=>'Meta Description'])!!}
             </div>
  
              <div class="form-group">
                {!! Form::label('v_metakeyword', 'Meta Keyword') !!}
                {!! Form::textarea('v_metakeyword', null, ['class'=>'form-control','id'=>'v_metakeyword','placeholder'=>'Meta Keyword'])!!}
              </div>

              <div class="form-group">
                {!! Form::label('i_order', 'Order') !!}
                {!! Form::text('i_order', 0, ['class'=>'form-control','id'=>'i_order','placeholder'=>'Order','maxlength'=>3,'style'=>'width:70px;'])!!}
              </div>
             
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
             </div>
             {!! Form::close() !!}
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

</script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'v_desc',{
    filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
} );
</script>
<script src="{{ asset('js/backend_js/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-validation/jquery.form-validate.js') }}"></script>

@endpush