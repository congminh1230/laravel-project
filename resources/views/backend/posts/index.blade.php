@section('link')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endsection
@extends('backend.layouts.master')
@section('content-header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tạo mới users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Danh sách bài viết</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
        <div class="col-12">
          <form style="margin: 20px 0 ; display:flex; justify-content:space-evenly " method="GET" action="{{ route('backend.posts.index')}}" class="form-inline"  >
            <div class="col-3">
              <input value="{{ request()->get('title')}}" name="title" type="text" class="form-control" placeholder="Nhập tiêu đề cần tìm..">
            </div>
            <div style="margin-right: 30px">
                <button type="submit" class="btn btn-info">Lọc</button>
              </div>
            {{-- <div >
                <a href="{{ route('backend.posts.index')}}" class="btn btn-default"> Quay lại</a>
            </div> --}}
          </form>
        </div>
        <table class="table table-striped projects">
                @can('create', App\Models\Post::class)
                  <a href="{{ route('backend.posts.create') }}" style="margin-bottom:10px" class="btn btn-success"><i style="margin-right:10px" class="fas fa-plus"></i>Tạo bài viết</a>
                @endcan
              <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Ảnh</th>
                        <th>Danh mục</th>
                        <th>Tags</th>
                        <th>Người tạo</th>
                        <th>Trạng thái</th>
                        {{-- <th>Lượt xem</th> --}}
                        <th>Thời gian tạo</th>
                        <th>Ngày cập nhật</th>
                        <th class="text-center">Hoạt động</th>
                      </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                    <tr>
                       
                        <td>{{ $post->id }}</td>
                        <td  style="width: 20%" > 
                            <a href="{{ route('backend.posts.show',['post' => $post->id ]) }}">{{ $post->title }}</a>
                        </td>
                        <td>
                          @if(!empty($post->image))
                            <img src="{{ Illuminate\Support\Facades\Storage::disk($post->disk)->url($post->image)}}"
                            width="100px">
                          @endif
                        </td>
                        <td class="text-center">
                            <span class="badge badge -info">{{ $post->category_name }}</span>
                        </td>
                        <td>
                            @foreach ($post->tags as $tag )
                                <span class="badge badge -info">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>  {{ $post->user->name }} </td>
                        <td>  {{ $post->status_text }} </td>
                        <td>  {!! date('d/m/Y', strtotime($post->created_at)) !!}</td>
                        <td>  {!! date('d/m/Y', strtotime($post->updated_at)) !!}</td>
                        <td>
                            @can('update',$post)
                            <a style="margin-right:10px;" href="{{ route('backend.posts.edit',['post' => $post->id ]) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            @endcan

                            @can('delete',$post)
                            <form method="POST" action="{{ route('backend.posts.destroy',['post' => $post->id ]) }}">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                              </button>
                            </form>
                            
                            @endcan

                        </td>
                    </tr>
                 @endforeach
              </tbody>
        </table>
          {{ $posts->links() }}
@endsection
@section('script')
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
@endsection

