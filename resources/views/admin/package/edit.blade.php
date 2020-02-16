@extends('layouts.backend_layout.admin_template')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('Edit Package') }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
          <li class="breadcrumb-item active"> {{ __('Edit Package') }}</li>
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
            <h3 class="card-title">Edit Package</h3>
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
          {!! Form::model($Package,['method'=>'PATCH', 'url'=> route('admin.package.recupdate',$Package->id), 'files' => true,'name'=>'edit_package', 'id'=>'edit_package','novalidate'=>'novalidate']) !!}
          {!! Form::hidden('id', null)!!}
          <div class="card-body col-md-8" >
            
            <div class="form-group">
              {!! Form::label('v_name', 'Name') !!} <span style='color:red';>*</span>
              {!! Form::text('v_name', null, ['class'=>'form-control','id'=>'v_name','placeholder'=>'Name'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('v_desc', 'Description') !!}
              {!! Form::textarea('v_desc', null, ['class'=>'form-control','id'=>'v_desc'])!!}
            </div>

             
              <div class="form-group">
                {!! Form::label('v_location', 'Location') !!} 
                {!! Form::textarea('v_location', null, ['rows'=>4,'class'=>'form-control','id'=>'v_location','placeholder'=>'Location'])!!}
             </div>

            
            <div class="form-group">
              {!! Form::label('tour_start_date', 'Tour Start Date') !!} <span style='color:red';>*</span>
              {!! Form::text('tour_start_date', null, ['class'=>'form-control','id'=>'datepicker','readonly'=>true])!!}
            </div>

            <div class="form-group">
              {!! Form::label('tour_end_date', 'Tour End Date') !!} <span style='color:red';>*</span>
              {!! Form::text('tour_end_date', null, ['class'=>'form-control','id'=>'datepicker1','readonly'=>true])!!}
            </div>

            <div class="form-group">
              {!! Form::label('last_book_date', 'Last Booking Date') !!} <span style='color:red';>*</span>
              {!! Form::text('last_book_date', null, ['class'=>'form-control','id'=>'datepicker2','readonly'=>true])!!}
            </div>

            <div class="form-group">
              {!! Form::label('v_map', 'Map') !!} 
              {!! Form::textarea('v_map', null, ['rows'=>4,'class'=>'form-control','id'=>'v_map','placeholder'=>'Map'])!!}
           </div>
           
           <div class="form-group">
            {!! Form::label('v_itinerary', 'Itinerary') !!}
            {!! Form::textarea('v_itinerary', null, ['class'=>'form-control','id'=>'v_itinerary'])!!}
          </div>

          <div class="form-group">
            {!! Form::label('v_price', 'Price (per person)') !!} <span style='color:red';>*</span>
            {!! Form::text('v_price', null, ['class'=>'form-control','id'=>'v_price','placeholder'=>'Price (per person)'])!!}
          </div>

          <div class="form-group">
            {!! Form::label('v_policy', 'Policy') !!}
            {!! Form::textarea('v_policy', null, ['class'=>'form-control','id'=>'v_policy'])!!}
          </div>

          <div class="form-group">
            {!! Form::label('v_terms', 'Terms and Conditions') !!}
            {!! Form::textarea('v_terms', null, ['class'=>'form-control','id'=>'v_terms'])!!}
          </div>


            <div class="form-group">
              {!! Form::label('is_featured', 'Is Featured ?') !!} 
              {!! Form::select('is_featured', ['No' => 'No', 'Yes' => 'Yes'],null, ['class'=>"form-control select2"])!!}
            
           </div>

           <div class="form-group">
            {!! Form::label('v_photo', 'Featured Photo') !!} <span style='color:red';>*</span>
            <div class="input-group">
              <div class="custom-file">
               
                {!! Form::file('v_photo',['class'=>'form-control','placeholder'=>'Photo','accept'=>'image/*']) !!}

              </div>
            </div>(Only jpg, jpeg, gif and png are allowed)
          </div>
          @if($Package->photo)
          <img height="100" src="{{$Package->photo}}" alt="">
          @endif
          <br>
          <div class="form-group">
           {!! Form::label('v_banner', 'Banner') !!} <span style='color:red';>*</span>
            <div class="input-group">
              <div class="custom-file">
                {!! Form::file('v_banner',['class'=>'form-control','placeholder'=>'Banner','accept'=>'image/*']) !!}
           
              </div>
              <div class="formerror"></div>
            </div>(Only jpg, jpeg, gif and png are allowed)
          </div>
          @if($Package->banner)
          <img height="50" src="{{$Package->banner}}" alt="">
          @endif
          <br>
            <div class="form-group">
              {!! Form::label('destination_id', 'Select Destination') !!} <span style='color:red';>*</span>
              {!! Form::select('destination_id',$categories,null, ['class'=>"form-control select2"])!!}
            </div>
          
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label" style="padding-top:13px;">Tour Photos </label>
            <div class="col-sm-8" style="padding-top:5px">
            <table id="photoSelection" class="table table-bordered">
              <thead>
              <tr>
              <th style="width:90%;">Select Photo</th>
              <th></th>
              </tr>
              </thead>
              <tbody>
            </table>
            <input type="button" class="btn btn-primary btn-xs" id="btnAddNew" value="+ Add Photo" style="margin-bottom:10px;">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-sm-3 control-label" style="padding-top:13px;">Tour Videos </label>
            <div class="col-sm-8" style="padding-top:5px">
              <table id="videoSelection" class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th style="width:90%;">Video iFrame Code</th>
                                          <th></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      
                                  </tbody>
                              </table>
                              <input type="button" class="btn btn-primary btn-xs" id="btnAddNew1" value="+ Add Video" style="margin-bottom:10px;">
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
  $(document).ready(function () {
    $(".select2").select2(),$("#datepicker").datepicker({autoclose:!0,format:"yyyy-mm-dd",todayBtn:"linked"}),$("#datepicker1").datepicker({autoclose:!0,format:"yyyy-mm-dd",todayBtn:"linked"}),$("#datepicker2").datepicker({autoclose:!0,format:"yyyy-mm-dd",todayBtn:"linked"}),$("#btnAddNew").on("click",function(){var e="";e+="<tr> ",e+='<td><input type="file" accept="image/*" name="photos[]"></td>',e+='<td><a href="javascript:void()" class="Delete btn btn-danger btn-xs">X</a></td>',e+=" </tr>",$("#photoSelection tbody").append(e),$(".select2").select2()}),$("#photoSelection").delegate("a.Delete","click",function(){return $(this).parent().parent().fadeOut("slow").remove(),!1}),$("#btnAddNew1").on("click",function(){var e="";e+="<tr> ",e+='<td><textarea name="videos[]" class="form-control" cols="30" rows="10" style="height:80px;"></textarea></td>',e+='<td><a href="javascript:void()" class="Delete1 btn btn-danger btn-xs">X</a></td>',e+=" </tr>",$("#videoSelection tbody").append(e),$(".select2").select2()}),$("#videoSelection").delegate("a.Delete1","click",function(){return $(this).parent().parent().fadeOut("slow").remove(),!1});
  })
CKEDITOR.replace( 'v_desc',{
    filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
} );
CKEDITOR.replace( 'v_itinerary',{
  filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
  filebrowserUploadMethod: 'form'
} );
CKEDITOR.replace( 'v_policy',{
  filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
  filebrowserUploadMethod: 'form'
} );
CKEDITOR.replace( 'v_terms',{
  filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
  filebrowserUploadMethod: 'form'
} );

</script>
<script src="{{ asset('js/backend_js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery-validation/jquery.form-validate.js') }}"></script>
<script src="{{ asset('js/backend_js/bootstrap-datepicker.js') }}"></script>
@endpush