@extends('layouts.auth')

@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href="{{ url('/') }}"><b>Selamat Datang</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login terlebih dahulu sebelum masuk</p>

    <form role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="text" class="form-control" placeholder="E-Mail" value="{{ old('email') }}" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
      <div class="row">
        <div class="col-xs-8">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <a class="btn btn-link" href="{{ route('password.request') }}">
            Forgot Your Password?
        </a>
      </div>
    </form>
  </div>
</div>
@endsection
