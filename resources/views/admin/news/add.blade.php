@extends('layouts.backend_layout.admin_template')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('Add News') }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
        
          <li class="breadcrumb-item active"> {{ __('Add News') }}</li>
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
            <h3 class="card-title">Add News</h3>
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
          {!! Form::open(['method'=>'POST', 'url'=> route('admin.news.recaddsubmit'),'files' => true, 'name'=>'add_news', 'id'=>'add_news','novalidate'=>'novalidate']) !!}
            <div class="card-body col-md-8" >
             
              <div class="form-group">
                {!! Form::label('v_title', 'News Title') !!} <span style='color:red';>*</span>
                {!! Form::text('v_title', null, ['class'=>'form-control','id'=>'v_title','placeholder'=>'News Title'])!!}
              </div>

               
                <div class="form-group">
                  {!! Form::label('v_short_content', 'News Short Content') !!} <span style='color:red';>*</span>
                  {!! Form::textarea('v_short_content', null, ['rows'=>4,'class'=>'form-control','id'=>'v_short_content','placeholder'=>'News Short Content'])!!}
               </div>

               <div class="form-group">
                {!! Form::label('v_desc', 'News Content') !!}
                {!! Form::textarea('v_desc', null, ['class'=>'form-control','id'=>'v_desc'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('publish_date', 'News Publish Date') !!} <span style='color:red';>*</span>
                {!! Form::text('publish_date', null, ['class'=>'form-control','id'=>'datepicker','readonly'=>true])!!}
              </div>
             
              <div class="form-group">
                {!! Form::label('category_id', 'Select Category') !!} <span style='color:red';>*</span>
                {!! Form::select('category_id',$categories,null, ['class'=>"form-control select2"])!!}
              </div>
              

              <div class="form-group">
                {!! Form::label('e_comment', 'Comment') !!} <span style='color:red';>*</span>
                {!! Form::select('e_comment', ['on' => 'on', 'off' => 'off'],null, ['class'=>"form-control select2"])!!}
              
             </div>

              <div class="form-group">
                {!! Form::label('v_photo', 'Featured Photo') !!} <span style='color:red';>*</span>
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
@push('css')
<link rel="stylesheet" href="{{ asset('css/backend_css/datepicker3.css') }}">
@endpush
@push('js')

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayBtn: 'linked',
    });
  })
CKEDITOR.replace( 'v_desc',{
    filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
} );

</script>
<script src="{{ asset('js/backend_js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-validation/jquery.form-validate.js') }}"></script>
<script src="{{ asset('js/backend_js/bootstrap-datepicker.js') }}"></script>

@endpush