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
                            <small>Thông tin</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('postsuaSP')}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{$sanpham->id}}">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input value="{{$sanpham->name}}" class="form-control" name="name" placeholder="Điền tên loại sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" name="price"  value="{{$sanpham->unit_price}}"/>

                            </div>
                            <div class="form-group">
                                <label>Giá quảng cáo</label>
                            <input class="form-control" name="promotion_price" placeholder="Điền giá quảng cáo" value="{{$sanpham->promotion_price}}" />
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select name="type" value="{{$sanpham->id_type}}">
                                        <option disabled selected> -- Chọn loại -- </option>
                                		@foreach($loaisp as $value)
                                			@if($value->id==$sanpham->id_type)
                                			<option selected value="{!! $value->id !!}">{{$value->name}}</option>
                                			@endif
                                			<option value="{!! $value->id !!}">{{$value->name}}</option>
                                		@endforeach

                                </select>
                                
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea  class="ckeditor" rows="3" name="description" value="{{$sanpham->description}}"></textarea>
                            </div>

                             <div class="form-group">
                                <label>Hình ảnh</label>
                                <img class="img-circle" src="{{asset('image/product/'.$sanpham->image)}}" width="500px" height="500px">

                                <label>Ảnh thay thế</label>
                                <input class="form-control" name="image" id="image" placeholder="Upload hình ảnh" type="file"/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                            <button type="submit" class="btn btn-success">Sửa sản phẩm</button>
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