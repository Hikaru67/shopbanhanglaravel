<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class BrandProduct extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_brand_product()
    {
        $this->AuthLogin();
    	return view('admin.add_brand_product');
    }

    public function all_brand_product()
    {
        $this->AuthLogin();
        $all_brand_product = Brand::orderby('brand_id', 'asc')->get();
    	$manager_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
    	return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }
    public function save_brand_product(Request $request)
    {
        $this->AuthLogin();
//    	$data = array();
//    	$data['brand_name'] = $request->brand_product_name;
//    	$data['brand_desc'] = $request->brand_product_desc;
//      $data['brand_slug'] = $request->slug_product_name;
//    	$data['brand_status'] = $request->brand_product_status;
//    	DB::table('tbl_brand')->insert($data);

        $brand = new Brand();
        $brand->brand_name = $request->brand_product_name;
        $brand->brand_desc = $request->brand_product_desc;
        $brand->brand_slug = $request->slug_product_name;
        $brand->brand_status = $request->brand_product_status;
        $brand->save();

    	Session::put('message','Thêm thương hiệu sản phẩm thành công');
    	return Redirect::to('add-brand-product');
    }
    public function edit_brand_product($brand_product_id)
    {
        $this->AuthLogin();
//    	$edit_brand_product = DB::table('tbl_brand')->where('brand_id', $brand_product_id)->get();
        $edit_brand_product = Brand::where('brand_id', $brand_product_id)->get();
    	$manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);
    	return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }
    public function update_brand_product(Request $request, $brand_product_id)
    {
        $this->AuthLogin();
//    	$data = array();
//    	$data['brand_name'] = $request->brand_product_name;
//    	$data['brand_desc'] = $request->brand_product_desc;
//    	DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update($data);
        
        $brand = Brand::find($brand_product_id);
        $brand->brand_name = $request->brand_product_name;
        $brand->brand_slug = $request->slug_product_name;
        $brand->brand_desc = $request->brand_product_desc;

    	Session::put('message', 'Cập nhật thương hiệu sản phẩm thành công');
    	return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_product_id)
    {
        $this->AuthLogin();
    	DB::table('tbl_brand')->where('brand_id', $brand_product_id)->delete();
    	Session::put('message', 'Xóa thương hiệu sản phẩm thành công');
    	return Redirect::to('all-brand-product');
    }

    public function unactive_brand_product($brand_product_id)
    {
        $this->AuthLogin();
    	DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update(['brand_status'=>0]);
    	Session::put('message', 'Hủy kích hoạt thương hiệu sản phẩm thành công');
    	return Redirect::to('all-brand-product');
    }
    public function active_brand_product($brand_product_id)
    {
        $this->AuthLogin();
    	DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update(['brand_status'=>1]);
    	Session::put('message', 'Kích hoạt thương hiệu sản phẩm thành công');
    	return Redirect::to('all-brand-product');
    }

     //End Function Admin Page

    public function show_brand_home($brand_id, Request $request)
    {
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id', 'asc')->get();
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_product.brand_id',$brand_id)->get();

        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id', $brand_id)->limit(1)->get();
        foreach ($brand_name as $value) {
            $meta_desc = $value->brand_desc;
            $meta_keywords  = $value->brand_name;
            $meta_title = $value->brand_name;
            $url_canonical = $request->url();
        }
        foreach ($brand_product as $key => $item) {
            $count[$item->brand_id] = DB::table('tbl_brand')->join('tbl_product', 'tbl_brand.brand_id','=','tbl_product.brand_id')
                ->where('tbl_brand.brand_status','1')->where('tbl_brand.brand_id', $item->brand_id)->count('tbl_product.product_id');
        }
        return view('pages.brand.show_brand')->with('category', $category_product)->with('brand', $brand_product)->with('brand_by_id', $brand_by_id)->with('brand_name', $brand_name)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('count', $count);
    }
}
