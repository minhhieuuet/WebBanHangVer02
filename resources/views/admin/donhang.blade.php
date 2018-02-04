@extends('admin.index')
@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                
                                <th>Ngày đặt hàng</th>
                                <th>Sản phẩm-Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Hình thức thanh toán</th>
                                <th>Ghi chú</th>
                                
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($donhang as $value)
                            <tr class="odd gradeX" align="center">
                                <td>{{$value->id}}</td>
                                <td>{{$value->customer->name}}</td>
                                <td>{{$value->date_order}}</td>
                                <td>@foreach($value->billdetails as $name)
                                    {{$name->products->name}}: {{$name->quantity}}<br>
                                    @endforeach
                                </td>

                                <td>{{$value->total}}</td>
                                <td>{{$value->payment}}</td>
                                <td>{{$value->note}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="san-pham/xoa/{{$value->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    {{$donhang->links()}}   
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection