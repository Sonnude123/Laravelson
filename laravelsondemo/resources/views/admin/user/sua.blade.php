 @extends('admin.layout.index')

 @section('content')
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>{{$user->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                          @if(count($errors)>0) 
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div> 
                        @endif
                        @if(session('thongbao'))
                         <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif

                        <form action="admin/user/sua/{{$user->id}}" method="POST" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input class="form-control" name="name" placeholder="nhập tên người dùng" value="{{$user->name}}">
                              
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="nhập email người dùng" value="{{$user->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                         {{--        <input type="checkbox" id="changePassword" name="changePassword"> --}}
                                <label>Đổi mật khẩu</label>
                                <input type="password" class="form-control" name="password" placeholder="nhập mật khẩu người dùng"  />
                            </div>
                              <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="passwordAgain" placeholder="nhập lại mật khẩu người dùng"  />
                            </div>
                        
                           
                            <div class="form-group">
                                <label>Quyền người dùng</label>
                                <label class="radio-inline">    
                                    <input name="quyen" value="0"
                                @if($user->quyen == 0)
                                {{"checked"}}
                                @endif
 
                                     type="radio">Thường
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1"
                                      @if($user->quyen == 1)
                                {{"checked"}}
                                @endif
                                     type="radio">Admin
                                </label>
                                
                            </div>
                            <button type="submit" class="btn btn-default">Sửa </button>
                            <button type="reset" class="btn btn-default">làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        @endsection

        @section('script')
           <script>
            $(document).ready(function(){
                $("#changePassword").change(function(){
                    if($(this).is(":checked"))
                    {
                        $(".password").removeAttr('disabled');
                    }
                    else   {
                        $(".password").attr('disabled','');
                    }
                });
            });
           </script>
        @endsection