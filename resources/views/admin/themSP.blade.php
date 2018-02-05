@extends('admin.index')
@section('content')
<div id="page-wrapper">
            @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        
                    </div>
                @endif
                @if(session('loi'))
                    <div class="alert alert-danger">
                        {{session('loi')}}
                    </div>
                @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('postthemSP')}}" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="name" placeholder="Điền tên loại sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" name="price" placeholder="Điền giá sản phẩm" />

                            </div>
                            <div class="form-group">
                                <label>Giá quảng cáo</label>
                                <input class="form-control" name="promotion_price" placeholder="Điền giá quảng cáo" />
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select name="type">
                                        <option disabled selected> -- Chọn loại -- </option>
                                		@foreach($loaisp as $value)
                                			<option value="{!! $value->id !!}">{{$value->name}}</option>
                                		@endforeach

                                </select>
                                
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea  class="ckeditor" rows="3" name="description"></textarea>
                            </div>

                             <div class="form-group">
                                <label>Hình ảnh</label>
                                <input class="form-control" name="image" id="image" placeholder="Upload hình ảnh" type="file"/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                            <button type="submit" class="btn btn-default">Thêm sản phẩm</button>
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