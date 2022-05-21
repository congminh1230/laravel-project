@extends('auth.auth_layouts')
@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Đăng Ký Tài Khoản</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Đăng Kí Thành Viên Mới</p>
      @if ($errors->any())
          <div class="alert alert-danger"><ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
      @endif
      <form action=" {{ route('auth.register') }} " method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Họ Và Tên">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Mật Khẩu">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Nhập Lại Mật Khẩu">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
                Đồng Ý Với Tất Cả Điều Khoản
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block"></input>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>Hoặc</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Liên Kết Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Liên Kết Google+
        </a>
      </div>

      <a href="{{ route('auth.login') }}" class="text-center">Đăng Nhập</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

@endsection
