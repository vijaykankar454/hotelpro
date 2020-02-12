@extends('layouts.backend_layout.admin_template')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('Edit Service') }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
          <li class="breadcrumb-item active"> {{ __('Edit Service') }}</li>
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
            <h3 class="card-title">Edit Service</h3>
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
          {!! Form::model($Service,['method'=>'PATCH', 'url'=> route('admin.service.recupdate',$Service->id), 'files' => true,'name'=>'edit_service', 'id'=>'edit_service','novalidate'=>'novalidate']) !!}
          {!! Form::hidden('id', null)!!}
          <div class="card-body col-md-8" >
            <div class="form-group">
              {!! Form::label('v_name', 'Name') !!} <span style='color:red';>*</span>
              {!! Form::text('v_name', null, ['class'=>'form-control','id'=>'v_name','placeholder'=>'Name'])!!}
            </div>

            <div class="form-group">
              {!! Form::label('v_short_description', 'Short Description') !!} <span style='color:red';>*</span>
              {!! Form::textarea('v_short_description', null, ['rows'=>5,'class'=>'form-control','id'=>'v_short_description','placeholder'=>'Short Description'])!!}
           </div>  
           <div class="form-group">
            {!! Form::label('v_desc', 'Description') !!} <span style='color:red';>*</span>
            {!! Form::textarea('v_desc', null, ['class'=>'form-control','id'=>'v_desc'])!!}
          </div>
          <div class="form-group">
            {!! Form::label('v_icon', 'Icon') !!} <span style='color:red';>*</span>
            {!! Form::text('v_icon', null, ['class'=>'form-control','id'=>'v_icon','placeholder'=>'Icon'])!!}
          </div>
          @if($Service->v_icon)
            <i class="{{$Service->v_icon}}" style="font-size:50px;"></i>
          @endif
          <br><br>
            <div class="form-group">
              {!! Form::label('v_photo', 'Photo') !!} <span style='color:red';>*</span>
              <div class="input-group">
                <div class="custom-file">
                 
                  {!! Form::file('v_photo',['class'=>'form-control','placeholder'=>'Photo','accept'=>'image/*']) !!}

                </div>
              </div>(Only jpg, jpeg, gif and png are allowed)
            </div>
            @if($Service->photo)
            <img height="150" src="{{$Service->photo}}" alt="">
            @endif
            <br> <br>

            <div class="form-group">
             {!! Form::label('v_banner', 'Banner') !!} <span style='color:red';>*</span>
              <div class="input-group">
                <div class="custom-file">
                  {!! Form::file('v_banner',['class'=>'form-control','placeholder'=>'Banner','accept'=>'image/*']) !!}
             
                </div>
                <div class="formerror"></div>
              </div>(Only jpg, jpeg, gif and png are allowed)
            </div>
            @if($Service->banner)
            <img height="130" src="{{$Service->banner}}" alt="">
            @endif<br>
            <br>

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
  CKEDITOR.replace( 'v_desc',{
    filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
} );

</script>
<script src="{{ asset('js/backend_js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-validation/jquery.form-validate.js') }}"></script>

@endpush