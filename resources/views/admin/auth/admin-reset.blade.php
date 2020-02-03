@extends('layouts.backend_layout.admin_template_main')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="#;"><b>Reset Password</a>
  </div>
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
   @endif
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      {!! Form::open(['method'=>'POST', 'url'=> route('admin.password.request'), 'aria-label'=>__('Login')]) !!}
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      
          {!! Form::email('email',$email, ['class'=>"form-control",'placeholder'=>'Email','required'=>'required','autocomplete'=>'email','autofocus'=>'autofocus'])!!}    
        
          @if ($errors->has('email'))
          <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
         
        </div>
       
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      
       
          {!! Form::password('password',  ['class'=>"form-control",'placeholder'=>'Password','required'=>'required'])!!}    
        
          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
         
        </div>
       
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
      
          {!! Form::password('password_confirmation', ['class'=>"form-control",'placeholder'=>'Confirm Password','required'=>'required'])!!}    
        
          @if ($errors->has('password_confirmation'))
          <span class="help-block">
              <strong>{{ $errors->first('password_confirmation') }}</strong>
          </span>
          @endif
         
        </div>
       

        <div class="row">
          <div class="col-12">
          
            {!! Form::submit('Reset Password', ['class'=>'btn btn-primary']) !!}
          </div>
          <!-- /.col -->
        </div>
        {!! Form::close() !!}

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection
