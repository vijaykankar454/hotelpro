@extends('layouts.backend_layout.admin_template_main')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="#;"><b>{{ config('app.name', 'TravelHub') }} - Admin panel</a>
  </div>
  @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
  @endif
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">{{ __('Sign in to start your session') }}</p>

     
      {!! Form::open(['method'=>'POST', 'url'=> route('admin.login'), 'aria-label'=>__('Login')]) !!}
     
        <div class="input-group mb-3">
        {!! Form::email('email', old('email'), ['class'=>"form-control",'placeholder'=>'Email','required'=>'required','autocomplete'=>'email','autofocus'=>'autofocus'])!!}    
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <div class="input-group-append">
            
          </div>
        </div>
        <div class="input-group mb-3">
          {!! Form::password('password',  ['class'=>"form-control",'placeholder'=>'Password','required'=>'required','autocomplete'=>'current-password'])!!}    
        
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <div class="input-group-append">
           
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
             
              <!--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                {{ __('Remember Me') }}
              </label>-->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            {!! Form::submit('Sign In', ['class'=>'btn btn-primary btn-block']) !!}
           
          </div>
          <!-- /.col -->
        </div>
        {!! Form::close() !!}

     
      <!-- /.social-auth-links -->
      @if (Route::has('password.request'))
      <p class="mb-1">
        <a class="btn btn-link" href="{{ route('admin.password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
      </p>
      @endif
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection