@section('link')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endsection
@extends('backend.layouts.master')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Danh sách đơn hàng</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Danh sách đơn hàng</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Stt</th>
                      <th>Sản phẩm</th>
                      <th>Số lượng</th>
                      <th>Tổng tiền</th>
                      <th>Người mua</th>
                      <th>Địa chỉ</th>
                      <th>Số điện thoại</th>
                      <th>Trạng thái</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->customer_name }}</td>
                      <td>{{ $order->quantity }}</td>
                      <td>{{ $order->total_price }}</td>
                      <td>{{ $order->user->name }}</td>
                      <td>{{ $order->address }}</td>
                      <td>{{ $order->phone }}</td>

                      <td style="display: flex;gap: 10px;" >
                        <span style="font-weight: 600;
                          color: red;" > {{$order->status_text}} </span>
                      <form  action="{{ route('backend.orders.updateStatus',['id' => $order->id]) }}" method="post">
                        @csrf
                        <select name="status" >
                          <option disabled selected>---Sửa trạng thái---</option>
                          <option value="1">Đã đặt hàng</option>
                          <option value="2">Đơn hàng đã được xác nhận</option>
                          <option value="3">Đang vận chuyển</option>
                          <option value="4" >Đã giao hàng</option>
                          <option value="5" >Đơn hàng bị hủy</option>
                        </select>
                            <button style="padding: 1px 10px;
                              text-transform: capitalize;
                              color: #ffffff;
                              background: #C70909;border-radius: 5px;border: 0;" type="submit">Cập Nhật</button>    	    	    	    	    	    	    
                      </form>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        
      </div>
@endsection
@section('script')
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
@endsection