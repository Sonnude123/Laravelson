 @extends('admin.layout.index')

 @section('content')
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
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

                        <form action="admin/user/them" method="POST" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input class="form-control" name="name" placeholder="nhập tên người dùng">
                              
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="nhập email người dùng" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="nhập mật khẩu người dùng" />
                            </div>
                              <div class="form-group">
                                <label>Nhập lại password</label>
                                <input type="password" class="form-control" name="passwordAgain" placeholder="nhập lại mật khẩu người dùng" />
                            </div>
                        
                           
                            <div class="form-group">
                                <label>Quyền người dùng</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" type="radio">Thường
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" checked="" type="radio">Admin
                                </label>
                                
                            </div>
                            <button type="submit" class="btn btn-default">Thêm </button>
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