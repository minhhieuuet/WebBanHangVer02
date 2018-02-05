

@extends('admin.index')
@section('content')
	<div class="row">
		<div class="col-sm-4"></div>
    <div  class="col-sm-8">
      <img src="@if(strcmp($khachhang->gender,'nam')) {{asset('image/male.png')}}@else {{asset('image/female1.png')}} @endif"  alt="" class="img-rounded" width="200px" height="200px">
    
    <div>
      <blockquote>
        <p>{{$khachhang->name}}</p>
        <small><i class="fa fa-home"></i><cite title="Source Title"><input style="width:240px;" type="email" name="email" value="{{$khachhang->address}}"> </cite></small>
      </blockquote>
      <p style="font-size: 20px;">
        <i class="fa fa-envelope"></i> <input style="width:340px;" type="email" name="email" value="{{$khachhang->email}}">   <br>
        <i class="fa fa-phone"></i><input style="width:340px;margin-left:9px; " type="text" name="phone" value="{{$khachhang->phone_number}}"> <br>
        <i class="fa fa-check-circle"></i> {{$khachhang->created_at}}
      </p>

      <button type="button" class="btn btn-success">Ghi nhận</button>
      <button type="button" class="btn btn-danger">Xóa</button>
    </div>
    </div>
@endsection	