@extends('admin.index')
@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách hàng
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                
                                <th>Giới tính</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                               	<th>Số điện thoại</th>
                                <th>Ngày tạo tài khoản</th>
                                
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($khachhang as $value)
                            <tr class="odd gradeX" align="center">
                                <td>{{$value->id}}</td>
                                <td><a href="khach-hang/profile/{{$value->id}}">{{$value->name}}<a></td>
                                <td>{{$value->gender}}</td>
                                <td>{{$value->email}}
                                

                                <td>{{$value->address}}</td>
                                <td>{{$value->phone_number}}</td>
                                <td>{{$value->created_at}}</td>
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="san-pham/xoa/{{$value->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    {{$khachhang->links()}}   
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection