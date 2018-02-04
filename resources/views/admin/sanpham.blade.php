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
                                <th>Tên</th>
                                <th>Loại sản phẩm</th>
                                <th>Mô tả</th>
                                <th>Hình Ảnh</th>
                                <th>Giá</th>
                                <th>Giá sau giảm</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>

                        	@foreach($sanpham as $value)
                            <tr class="odd gradeX" align="center">
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->typeproducts->name}}</td>
                                <td>{{$value->description}}</td>

                                <td><img src="/image/product/{{$value->image}}" width="50px" height="50px"></td>
                                <td>{{$value->unit_price}}</td>
                                <td>{{$value->promotion_price}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="san-pham/xoa/{{$value->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    {{$sanpham->links()}}	
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection