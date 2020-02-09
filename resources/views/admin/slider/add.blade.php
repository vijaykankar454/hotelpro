@extends('layouts.backend_layout.admin_template')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('Add Slider') }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
        
          <li class="breadcrumb-item active"> {{ __('Add Slider') }}</li>
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
            <h3 class="card-title">Add Slider</h3>
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
          {!! Form::open(['method'=>'POST', 'url'=> route('admin.slider.recaddsubmit'),'files' => true, 'name'=>'add_slider', 'id'=>'add_slider','novalidate'=>'novalidate']) !!}
            <div class="card-body col-md-8" >
            
              <div class="form-group">
                {!! Form::label('v_photo', 'Photo') !!} <span style='color:red';>*</span>
                <div class="input-group">
                  <div class="custom-file">
                   
                    {!! Form::file('v_photo',['class'=>'form-control','placeholder'=>'Photo','accept'=>'image/*']) !!}

                  </div>
                </div>(Only jpg, jpeg, gif and png are allowed)
              </div>
              <div class="form-group">
                {!! Form::label('v_heading', 'Heading') !!}
                {!! Form::text('v_heading', null, ['class'=>'form-control','id'=>'v_heading','placeholder'=>'Heading'])!!}
              </div>

              <div class="form-group">
                {!! Form::label('v_content', 'Content') !!}
                {!! Form::textarea('v_content', null, ['rows'=>4,'class'=>'form-control','id'=>'v_content','placeholder'=>'Content'])!!}
             </div>

             <div class="form-group">
              {!! Form::label('v_button_text', 'Button Text') !!}
              {!! Form::text('v_button_text', null, ['class'=>'form-control','id'=>'v_button_text','placeholder'=>'Button Text'])!!}
            </div> 
             
            <div class="form-group">
              {!! Form::label('v_button_url', 'Button URL') !!}
              {!! Form::text('v_button_url', null, ['class'=>'form-control','id'=>'v_button_url','placeholder'=>'Button URL'])!!}
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

<script src="{{ asset('js/backend_js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-validation/jquery.form-rvalidate.js') }}"></script>

@endpush