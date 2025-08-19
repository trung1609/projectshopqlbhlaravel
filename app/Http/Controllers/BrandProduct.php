<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Brand;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if(Session::get('login_normal')){
            if($admin_id){
                return Redirect::to('dashboard');
            }
        }else{
            return Redirect::to('admin')->send();
        }

    }
    public function add_brand_product(){
        // $this->AuthLogin(); //check người dùng thông qua hàm AuthLogin 
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        // $this->AuthLogin();//check người dùng thông qua hàm AuthLogin
        // $all_brand_product = DB::table('tbl_brand')->get(); // sử dụng DB
        $all_brand_product = Brand::all(); //static trong oop
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }
    public function save_brand_product(Request $request){
        // $this->AuthLogin();//check người dùng thông qua hàm AuthLogin
        $data = $request->all();
        $brand = new Brand(); // tạo 1 đối tượng mới trong model
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();
        // $data = array();
        // $data['brand_name']=$request->brand_product_name;
        // $data['brand_desc']=$request->brand_product_desc;
        // $data['brand_status']=$request->brand_product_status;
        
        // DB::table('tbl_brand')->insert($data);

        Session::put('message','Add brand success');
        return Redirect::to('add-brand-product');
    }
    public function unactive_brand_product($brand_product_id){
        // $this->AuthLogin();//check người dùng thông qua hàm AuthLogin
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        Session::put('message','Product brand activation failed');
        return Redirect::to('all-brand-product');
    }
    public function active_brand_product($brand_product_id){
        // $this->AuthLogin();//check người dùng thông qua hàm AuthLogin
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        Session::put('message','Product brand activation successfully');
        return Redirect::to('all-brand-product');
    }
    public function edit_brand_product($brand_product_id){
        // $this->AuthLogin();//check người dùng thông qua hàm AuthLogin
        $edit_brand_product = Brand::where('brand_id',$brand_product_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }
    public function update_brand_product(Request $request,$brand_product_id){
        // $this->AuthLogin();//check người dùng thông qua hàm AuthLogin
        $data = $request->all();
        $brand = Brand::find($brand_product_id);
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->save();

        // $data = array();
        // $data['brand_name']=$request->brand_product_name;
        // $data['brand_desc']=$request->brand_product_desc;
        // DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','Brand updated successfully');
        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_product_id){
        // $this->AuthLogin();//check người dùng thông qua hàm AuthLogin
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','Brand deleted successfully');
        return Redirect::to('all-brand-product');
    }
    //End function admin page
    public function show_brand_home(Request $request,$brand_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id', '=', 'tbl_brand.brand_id')->where('tbl_product.brand_id',$brand_id)->get();
        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->limit(1)->get();
        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }
}
