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
                                <th>Name</th>
                                <th>Category Parent</th>
                                <th>Hình Ảnh</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>

                        	@foreach($theloai as $value)
                            <tr class="odd gradeX" align="center">
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                
                                <td>{{$value->description}}</td>
                                <td><img src="public/image/product/{{$value->image}}" width="50px" height="50px"></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    {{$theloai->links()}}	
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection