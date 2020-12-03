<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class HomeController extends Controller
{
    public function index(Request $request)
    {
      //seo
      $meta_desc = "Sản phẩm công nghệ";
      $meta_keywords  = "ShoppingAll4You";
      $meta_title = "Home | ShoppingAll4You";
      $url_canonical = $request->url();
      //--seo
    	$category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'asc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id', 'asc')->get();
  		// $all_product = DB::table('tbl_product')
      //   	->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
      //   	->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
      //   	->orderby('product_id','asc')->get();

    	$all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id', 'desc')->limit(4)->get();

    	return view('pages.home')->with('category', $category_product)->with('brand', $brand_product)->with('all_product', $all_product)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical);
    }
    public function search(Request $request)
    {
      $keywords = $request->keywords_submit;
      if($keywords==''){
        return Redirect('/');
      }
      $meta_desc = "Tìm kiếm sản phẩm";
      $meta_keywords  = $keywords;
      $meta_title = "ShoppingAll4You";
      $url_canonical = $request->url();
      $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'asc')->get();
      $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id', 'asc')->get();

      $search_items = DB::table('tbl_product')->where('product_name', 'like', '%'.$keywords.'%')->get();
      return view('pages.product.search')->with('category', $category_product)->with('brand', $brand_product)->with('search_items', $search_items)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical);
    }
}
