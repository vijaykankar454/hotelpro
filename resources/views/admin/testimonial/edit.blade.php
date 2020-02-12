@extends('layouts.backend_layout.admin_template')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('Edit Testimonial') }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
          <li class="breadcrumb-item active"> {{ __('Edit Testimonial') }}</li>
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
            <h3 class="card-title">Edit Testimonial</h3>
          </div>
          @if (count($errors) > 0)
            <div class = "alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          </div>
          @endif
          <!-- /.card-header -->
          <!-- form start -->
          {!! Form::model($Testimonial,['method'=>'PATCH', 'url'=> route('admin.testimonial.recupdate',$Testimonial->id), 'files' => true,'name'=>'edit_testimonial', 'id'=>'edit_testimonial','novalidate'=>'novalidate']) !!}
          {!! Form::hidden('id', null)!!}
          <div class="card-body col-md-8" >
            <div class="form-group">
              {!! Form::label('v_name', 'Name') !!} <span style='color:red';>*</span>
              {!! Form::text('v_name', null, ['class'=>'form-control','id'=>'v_name','placeholder'=>'Name'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('v_designation', 'Designation') !!} <span style='color:red';>*</span>
              {!! Form::text('v_designation', null, ['class'=>'form-control','id'=>'v_designation','placeholder'=>'Designation'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('v_photo', 'Photo') !!} <span style='color:red';>*</span>
              <div class="input-group">
                <div class="custom-file">
                 
                  {!! Form::file('v_photo',['class'=>'form-control','placeholder'=>'Photo','accept'=>'image/*']) !!}

                </div>
              </div>(Only jpg, jpeg, gif and png are allowed)
            </div>
            @if($Testimonial->photo)
              <img height="150" src="{{$Testimonial->photo}}" alt="">
              @endif
              <br><br>
            <div class="form-group">
              {!! Form::label('v_comment', 'Comment') !!} <span style='color:red';>*</span>
              {!! Form::textarea('v_comment', null, ['rows'=>4,'class'=>'form-control','id'=>'v_comment','placeholder'=>'Comment'])!!}
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

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'v_desc',{
    filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
} );
</script>
<script src="{{ asset('js/backend_js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-validation/jquery.form-validate.js') }}"></script>

@endpush