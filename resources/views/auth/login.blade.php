@extends('auth.auth_layouts')
@section('content')
<div class="login-box" style="margin: auto">
  <div class="login-logo">
    <a href="../../index2.html"><b>Đăng Nhập</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Đăng Nhập Để Được Trải Nghiệm Dịch Vụ </p>

      <form action="{{ route('auth.login') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email"class="form-control" placeholder="Email" value="{{ Illuminate\Support\Facades\Cookie::get('email')}}" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" value="true">
              <label for="remember">
                 Nhớ Tài Khoản
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Liên Kết Facebook
        </a>
        <a href="" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Liên Kết Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{ route('auth.register') }}" class="text-center">Đăng Ký Tài Khoản</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection