@extends('admin.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            
                            <div class="form-group">
                                <label>Tên loại sản phẩm</label>
                                <input class="form-control" name="txtCateName" placeholder="Điền tên loại sản phẩm" />
                            </div>
                            
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                             <div class="form-group">
                                <label>Hình ảnh</label>
                                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" type="file"/>
                            </div>
                            <button type="submit" class="btn btn-default">Category Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection