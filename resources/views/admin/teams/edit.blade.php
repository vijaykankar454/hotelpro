@extends('layouts.backend_layout.admin_template')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('Edit Team Member') }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
          <li class="breadcrumb-item active"> {{ __('Edit Team Member') }}</li>
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
            <h3 class="card-title">Edit Team Member</h3>
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
          {!! Form::model($Teams,['method'=>'PATCH', 'url'=> route('admin.team.recupdate',$Teams->id), 'files' => true,'name'=>'edit_team', 'id'=>'edit_team','novalidate'=>'novalidate']) !!}
          {!! Form::hidden('id', null)!!}
          <div class="card-body col-md-8" >
            <div class="form-group">
              {!! Form::label('v_name', 'Name') !!} <span style='color:red';>*</span>
              {!! Form::text('v_name', null, ['class'=>'form-control','id'=>'v_name','placeholder'=>'Name'])!!}
            </div>

            <div class="form-group">
              {!! Form::label('v_phone', 'Phone') !!} 
              {!! Form::text('v_phone', null, ['class'=>'form-control','id'=>'v_phone','placeholder'=>'Phone'])!!}
            </div>

            <div class="form-group">
              {!! Form::label('v_email', 'Email') !!}
              {!! Form::text('v_email', null, ['class'=>'form-control','id'=>'v_email','placeholder'=>'Email'])!!}
            </div>

            <div class="form-group">
              {!! Form::label('v_website', 'Website') !!}
              {!! Form::text('v_website', null, ['class'=>'form-control','id'=>'v_website','placeholder'=>'Website'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('v_designation', 'Designation') !!} <span style='color:red';>*</span>
              {!! Form::text('v_designation', null, ['class'=>'form-control','id'=>'v_designation','placeholder'=>'Designation'])!!}
            </div>

            <div class="form-group">
              {!! Form::label('v_photo', 'Photo') !!} 
              <div class="input-group">
                <div class="custom-file">
                 
                  {!! Form::file('v_photo',['class'=>'form-control','placeholder'=>'Photo','accept'=>'image/*']) !!}

                </div>
              </div>(Only jpg, jpeg, gif and png are allowed)
            </div>

            <div class="form-group">
             {!! Form::label('v_banner', 'Banner') !!} 
              <div class="input-group">
                <div class="custom-file">
                  {!! Form::file('v_banner',['class'=>'form-control','placeholder'=>'Banner','accept'=>'image/*']) !!}
             
                </div>
                <div class="formerror"></div>
              </div>(Only jpg, jpeg, gif and png are allowed)
            </div>
          
            <div class="form-group">
              {!! Form::label('v_description', 'Description') !!}
              {!! Form::textarea('v_description', null, ['class'=>'form-control','id'=>'v_desc'])!!}
            </div>

            <div class="form-group">
              {!! Form::label('v_facebooklink', 'Facebook') !!}
              {!! Form::text('v_facebooklink', null, ['class'=>'form-control','id'=>'v_facebooklink','placeholder'=>'Facebook'])!!}
            </div>

            <div class="form-group">
              {!! Form::label('v_twitterlink', 'Twitter') !!}
              {!! Form::text('v_twitterlink', null, ['class'=>'form-control','id'=>'v_twitterlink','placeholder'=>'Twitter'])!!}
            </div>

            <div class="form-group">
              {!! Form::label('v_googlepluslink', 'Google Plus') !!}
              {!! Form::text('v_googlepluslink', null, ['class'=>'form-control','id'=>'v_googlepluslink','placeholder'=>'Google Plus'])!!}
            </div>

            <div class="form-group">
              {!! Form::label('v_instagramlink', 'Instagram') !!}
              {!! Form::text('v_instagramlink', null, ['class'=>'form-control','id'=>'v_instagramlink','placeholder'=>'Instagram'])!!}
            </div>

            <div class="form-group">
              {!! Form::label('v_flickr', 'Flickr') !!}
              {!! Form::text('v_flickr', null, ['class'=>'form-control','id'=>'v_flickr','placeholder'=>'Flickr'])!!}
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

            <div class="form-group">
              {!! Form::label('i_order', 'Order') !!}
              {!! Form::text('i_order',null, ['class'=>'form-control','id'=>'i_order','placeholder'=>'Order','maxlength'=>3,'style'=>'width:70px;'])!!}
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