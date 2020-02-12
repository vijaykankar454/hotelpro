@extends('layouts.backend_layout.admin_template')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('Add Destination') }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
        
          <li class="breadcrumb-item active"> {{ __('Add Destination') }}</li>
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
            <h3 class="card-title">Add Destination</h3>
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
          {!! Form::open(['method'=>'POST', 'url'=> route('admin.destination.recaddsubmit'),'files' => true, 'name'=>'add_destination', 'id'=>'add_destination','novalidate'=>'novalidate']) !!}
            <div class="card-body col-md-8" >
             
              <div class="form-group">
                {!! Form::label('v_name', 'Name') !!} <span style='color:red';>*</span>
                {!! Form::text('v_name', null, ['class'=>'form-control','id'=>'v_name','placeholder'=>'Name'])!!}
              </div>

              <div class="form-group">
                {!! Form::label('v_heading', 'Heading') !!} 
                {!! Form::text('v_heading', null, ['class'=>'form-control','id'=>'v_heading','placeholder'=>'Heading'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('v_short_description', 'Short Description') !!}
                {!! Form::textarea('v_short_description', null, ['rows'=>5,'class'=>'form-control','id'=>'v_short_description','placeholder'=>'Short Description'])!!}
             </div>  
             <div class="form-group">
              {!! Form::label('v_pack_heading', 'Package Heading') !!} 
              {!! Form::text('v_pack_heading', null, ['class'=>'form-control','id'=>'v_pack_heading','placeholder'=>'Package Heading'])!!}
            </div>

            <div class="form-group">
              {!! Form::label('v_pack_sub_heading', 'Package SubHeading') !!} 
              {!! Form::text('v_pack_sub_heading', null, ['class'=>'form-control','id'=>'v_pack_sub_heading','placeholder'=>'Package SubHeading'])!!}
            </div>

            <div class="form-group">
              {!! Form::label('v_det_heading', 'Detail Heading') !!} 
              {!! Form::text('v_det_heading', null, ['class'=>'form-control','id'=>'v_det_heading','placeholder'=>'Detail Heading'])!!}
            </div>

            <div class="form-group">
              {!! Form::label('v_det_sub_heading', 'Detail SubHeading') !!} 
              {!! Form::text('v_det_sub_heading', null, ['class'=>'form-control','id'=>'v_det_sub_heading','placeholder'=>'Detail SubHeading'])!!}
            </div>


              <div class="form-group">
                {!! Form::label('v_photo', 'Photo') !!} <span style='color:red';>*</span>
                <div class="input-group">
                  <div class="custom-file">
                   
                    {!! Form::file('v_photo',['class'=>'form-control','placeholder'=>'Photo','accept'=>'image/*']) !!}

                  </div>
                </div>(Only jpg, jpeg, gif and png are allowed)
              </div>

              <div class="form-group">
               {!! Form::label('v_banner', 'Banner') !!} <span style='color:red';>*</span>
                <div class="input-group">
                  <div class="custom-file">
                    {!! Form::file('v_banner',['class'=>'form-control','placeholder'=>'Banner','accept'=>'image/*']) !!}
               
                  </div>
                  <div class="formerror"></div>
                </div>(Only jpg, jpeg, gif and png are allowed)
              </div>
            
              <div class="form-group">
                {!! Form::label('v_introduction', 'Introduction') !!}
                {!! Form::textarea('v_introduction', null, ['class'=>'form-control','id'=>'v_intro'])!!}
              </div>

              <div class="form-group">
                {!! Form::label('v_experience', 'Experience') !!}
                {!! Form::textarea('v_experience', null, ['class'=>'form-control','id'=>'v_exp'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('v_weather', 'Weather') !!}
                {!! Form::textarea('v_weather', null, ['class'=>'form-control','id'=>'v_weather'])!!}
              </div>

              <div class="form-group">
                {!! Form::label('v_hotel', 'Hotel') !!}
                {!! Form::textarea('v_hotel', null, ['class'=>'form-control','id'=>'v_hotel'])!!}
              </div>

              <div class="form-group">
                {!! Form::label('v_transportation', 'Transportation') !!}
                {!! Form::textarea('v_transportation', null, ['class'=>'form-control','id'=>'v_transportation'])!!}
              </div>

              <div class="form-group">
                {!! Form::label('v_culture', 'Culture') !!}
                {!! Form::textarea('v_culture', null, ['class'=>'form-control','id'=>'v_culture'])!!}
              </div>

            </div>
           
            <div class="card-header" style='background-color: #007bff;color:white;'>
              <h3 class="card-title"><b>SEO Information</b></h3>
            </div> 
            <div class="card-body col-md-8" >    
              <div class="form-group">
                {!! Form::label('v_metatitile', 'Meta TItle') !!}
                {!! Form::textarea('v_metatitile', null, ['rows'=>4,'class'=>'form-control','id'=>'v_metatitile','placeholder'=>'Meta TItle'])!!}
             </div>
              
              <div class="form-group">
                {!! Form::label('v_metadescription', 'Meta Description') !!}
                {!! Form::textarea('v_metadescription', null, ['rows'=>4,'class'=>'form-control','id'=>'v_metadescription','placeholder'=>'Meta Description'])!!}
             </div>
  
              <div class="form-group">
                {!! Form::label('v_metakeyword', 'Meta Keyword') !!}
                {!! Form::textarea('v_metakeyword', null, ['rows'=>4,'class'=>'form-control','id'=>'v_metakeyword','placeholder'=>'Meta Keyword'])!!}
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
CKEDITOR.replace( 'v_intro',{
    filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
} );

CKEDITOR.replace( 'v_exp',{
  filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
  filebrowserUploadMethod: 'form'
} );
CKEDITOR.replace( 'v_weather',{
  filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
  filebrowserUploadMethod: 'form'
} );
CKEDITOR.replace( 'v_hotel',{
  filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
  filebrowserUploadMethod: 'form'
} );
CKEDITOR.replace( 'v_transportation',{
  filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
  filebrowserUploadMethod: 'form'
} );
CKEDITOR.replace( 'v_culture',{
  filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
  filebrowserUploadMethod: 'form'
} );
</script>
<script src="{{ asset('js/backend_js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-validation/jquery.form-validate.js') }}"></script>

@endpush