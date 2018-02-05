<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\TypeProducts;
use Illuminate\Http\Request;
use App\Products;
use App\Bills;
use Illuminate\Support\Facades\Auth;
use App\Customer;
class AdminController extends Controller
{

    public function getDangnhapAdmin()
    {
        return view('admin.login');
    }

    public function postDangnhapAdmin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3'
        ],[
            'email.required'=>'Bạn cần nhập email',
            'password.required'=>'Bạn cần nhập password',
            'password.min'=>'Mật khẩu quá ngắn'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
            {
                return redirect('admin/trang-chu');
            }
        else
        {
            return back()->with('thongbao','Đăng nhập không thành công');
        }
    }

    public function dangxuat()
    {
        Auth::logout();
        return redirect('admin/dang-nhap');
    }

    //Trang chu

    public function trangchu()
    {
        $customer=Customer::get()->count();
        $product=Products::get()->count();
        $bill=Bills::get()->count();
        $type=TypeProducts::get()->count();
        return view('admin.trangchu',['customer'=>$customer,'product'=>$product,'bill'=>$bill,'type'=>$type]);
    }

    
    //San pham
    public function sanpham()
    {
    	$sanpham=Products::orderBy('id','asc')->paginate(10);
    	return view('admin.sanpham',['sanpham'=>$sanpham]);
    }

    public function xoaSP($id)
    {
    	Products::destroy($id);
    	return redirect('admin/san-pham')->with('thongbaoxoa','Xóa thành công sản phẩm');
    }

    public function themSP()
    {
        $loaisp=TypeProducts::get();
        return view('admin.themSP',['loaisp'=>$loaisp]);
    }
    public function postthemSP(Request $request)
    {
        $sanpham=new Products;
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required'
            

        ],[

            'name.required'=>'Bạn cần nhập tên sản phẩm',
            'price'=>'Bạn cần nhập giá sản phẩm'

        ]);

        $sanpham->name=$request->name;
        $sanpham->id_type=$request->get('type');
        $sanpham->unit_price=$request->price;
        $sanpham->promotion_price=$request->promotion_price;
        $sanpham->description=$request->description;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
            {
                return redirect('admin/loai-san-pham/them')->with('loi','Bạn chỉ được chọn ảnh đinh dạng jpg,png,jpeg');
            }
            else
            {
                $name=$file->getClientOriginalName();
                $Hinh=str_random(5)."-".$name;

                while(file_exists("image/product/".$Hinh))
                {
                    $Hinh=str_random(5)."-".$name;
                    
                }

                $file->move('image/product',$Hinh);
                    $sanpham->image=$Hinh;
                
            }
        }
        else
        {
            $sanpham->image=" ";
        }

        $sanpham->save();
        return redirect('admin/san-pham')->with('thongbao','Thêm thành công '.$request->name);
    }
    
    public function suaSP($id){
        $sanpham=DB::table('products')->where('id',$id)->first();
        $loaisp=TypeProducts::get();
        return view('admin.suaSP',['sanpham'=>$sanpham,'loaisp'=>$loaisp]);
    }
    //Post sửa sản phẩm
    public function postsuaSP(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required'
        ],[
            'name.required'=>'Bạn cần nhập tên sản phẩm',
            'price.required'=>'Bạn cần nhập giá',
        ]);

        $sanpham=Products::find($request->id);
        $sanpham->name=$request->name;
        $sanpham->id_type=$request->get('type');
        $sanpham->unit_price=$request->price;
        $sanpham->promotion_price=$request->promotion_price;
        $sanpham->description=$request->description;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
            {
                return redirect('admin/loai-san-pham/them')->with('loi','Bạn chỉ được chọn ảnh đinh dạng jpg,png,jpeg');
            }
            else
            {
                $name=$file->getClientOriginalName();
                $Hinh=str_random(5)."-".$name;

                while(file_exists("image/product/".$Hinh))
                {
                    $Hinh=str_random(5)."-".$name;
                    
                }

                $file->move('image/product',$Hinh);
                    $sanpham->image=$Hinh;
                
            }
        }
        else
        {
            $sanpham->image=$request->image;
        }

        $sanpham->save();

        return redirect('admin/san-pham/'.$request->id)->with('thongbao','Sửa thành công');
    }

    //Loai san pham
    public function theloai(){
        $theloai=TypeProducts::paginate(5);
        return view('admin.category',['theloai'=>$theloai]);
    }

    public function xoaLSP($id)
    {
    	TypeProducts::destroy($id);

    	return back();
    }

    public function postthemLSP(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required'
        ],[
            'name.required'=>'Bạn chưa nhập tên',
            'description.required'=>'Bạn chưa nhập mô tả'
        ]);
    	$loaisp=new TypeProducts;
        $loaisp->name=$request->name;
        $loaisp->description=$request->description;
        
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
            {
                return redirect('admin/loai-san-pham/them')->with('loi','Bạn chỉ được chọn ảnh đinh dạng jpg,png,jpeg');
            }
            else
            {
                $name=$file->getClientOriginalName();
                $Hinh=str_random(5)."-".$name;

                while(file_exists("image/product/".$Hinh))
                {
                    $Hinh=str_random(5)."-".$name;
                    
                }

                $file->move('image/product',$Hinh);
                    $loaisp->image=$Hinh;
                
            }
        }
        else
        {
                $loaisp->image=" ";
        }
        $loaisp->save();
    	return redirect('admin/loai-san-pham/them')->with('thongbao','Thêm thành công');
    }

    //Don hang

    public function donhang()
    {
    	$donhang=Bills::paginate(10);
    	return view('admin.donhang',['donhang'=>$donhang]);
    }

    //Khach hang

    public function khachhang()
    {
    	$khachhang=Customer::orderBy('id','ASC')->paginate(10);
    	return view('admin.khachhang',['khachhang'=>$khachhang]);
    }

    public function profile($id)
    {
        $khachhang=Customer::find($id);
        return view('admin.profile-customer',['khachhang'=>$khachhang]);
    }
}
