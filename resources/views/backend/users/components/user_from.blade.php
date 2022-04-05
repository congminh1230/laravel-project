<form id="quickForm" method="POST" action="{{route('backend.users.update, ['user' => $user->id ]')}}"enctype="multipart/form-data" >
@csrf
                  @if(isset($method))

                        @switch($method)

                            @case('put')
                            <input type="hidden" name="_method" value="put">
                                @break
                        
                            @case(2)
                                Second case...
                                @break
                        
                            @default
                                Default case...
                  @endswitch
                  @endif


                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="name" name="name" class="form-control" value="{{ $user->name }}" id="exampleInputEmail1" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Tải lên ảnh</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="avatar">
                            <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                        </div>
                        <div class="input-group-append">
                        <span class="input-group-text">Tải lên</span>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">phone</label>
                    <input type="phone" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter avatar">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>