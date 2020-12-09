<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Mail;
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
        $category_product = Category::where('category_status','1')->orderby('category_id', 'asc')->get();
        $brand_product = Brand::where('brand_status','1')->orderby('brand_id', 'asc')->get();

        foreach ($brand_product as $key => $item) {
            $count[$item->brand_id] = Brand::join('tbl_product', 'tbl_brand.brand_id','=','tbl_product.brand_id')
                ->where('tbl_brand.brand_status','1')->where('tbl_brand.brand_id', $item->brand_id)->count('tbl_product.product_id');
        }

        $all_product = Product::where('product_status','1')->orderby('product_id', 'desc')->limit(6)->get();

        return view('pages.home')->with('category', $category_product)->with('brand', $brand_product)->with('all_product', $all_product)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('count',$count);
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
      $category_product = Category::where('category_status','1')->orderby('category_id', 'asc')->get();
      $brand_product = Brand::where('brand_status','1')->orderby('brand_id', 'asc')->get();

      $search_items = Product::where('product_name', 'like', '%'.$keywords.'%')->get();
        foreach ($brand_product as $key => $item) {
        $count[$item->brand_id] = Brand::join('tbl_product', 'tbl_brand.brand_id','=','tbl_product.brand_id')
            ->where('tbl_brand.brand_status','1')->where('tbl_brand.brand_id', $item->brand_id)->count('tbl_product.product_id');
        }
      return view('pages.product.search')->with('category', $category_product)->with('brand', $brand_product)->with('search_items', $search_items)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('count', $count);
    }
    public function send_mail(){
        //sendmail
        $to_name = "Shopping All4You";
        $to_email = "shinigamii.hikaru@gmail.com";//send to this mail

        $data = array("name" => "Mail từ khách hàng", "body" => "Mail gửi về vấn đề ăn chơi");// Body ò mail.blade.php
        Mail::send('pages.send_mail',$data, function ($message) use ($to_name, $to_email){
            $message->to($to_email)->subject('Test 01');//send this mail with subject
            $message->from($to_email, $to_name);//send from this mail
        });
        //---send mail
//        return redirect('/')->with('message','');
    }
}
