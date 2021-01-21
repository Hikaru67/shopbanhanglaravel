<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
session_start();

class CartController extends Controller
{
    /*public function save_cart(Request $request)
    {
    	$productId = $request->input('productid_hidden');
    	$quanlity = $request->input('qty');
    	$productInfo = Product::where('product_id', $productId)->first();

    	$category_product = Category::where('category_status','1')->orderby('category_id', 'asc')->get();
        $brand_product = Brand::where('brand_status','1')->orderby('brand_id', 'asc')->get();

        $data['id'] = $productId;
        $data['qty'] = $quanlity;
        $data['name'] = $productInfo->product_name;
        $data['price'] = $productInfo->product_price;
        $data['weight'] = '100';
        $data['options']['image'] = $productInfo->product_image;
        Cart::add($data);
        return Redirect::to('/show-cart');
    }*/
    public function add_to_cart(Request $request)
    {
        $productId = $request->input('productid_hidden');
        $quantity = $request->input('qty');
        $productInfo = Product::where('product_id', $productId)->first();

        $data['id'] = $productId;
        $data['qty'] = $quantity;
        $data['name'] = $productInfo->product_name;
        $data['price'] = $productInfo->product_price;
//        $data['weight'] = '100';
        $data['image'] = $productInfo->product_image;

        $cart = Session::get('cart');
        $session_id = substr(md5(microtime()),rand(0,26),5);
        if($cart){
            $is_available = 0;
            foreach ($cart as $key => &$value){
                if($value['product_id']==$data['id']){
                    $is_available++;
                    $value['product_qty'] += $data['qty'];
                    Session::put('cart', $cart);
                }
                //
            }
            if($is_available == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_id' => $data['id'],
                    'product_name' => $data['name'],
                    'product_image' => $data['image'],
                    'product_qty' => $data['qty'],
                    'product_price' => $data['price'],
                );
                Session::put('cart', $cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['id'],
                'product_name' => $data['name'],
                'product_image' => $data['image'],
                'product_qty' => $data['qty'],
                'product_price' => $data['price'],
            );
            Session::put('cart', $cart);
        }
        Session::save();
        return Redirect::to('/gio-hang');

    }
    public function update_cart_qty(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        foreach ($cart as $key => &$value){
            if($value['product_id']==$data['cart_product_id']){
                $value['product_qty'] = $data['cart_product_qty'];
            }
        }
        Session::put('cart', $cart);
        Session::save();
    }

    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');

        if($cart){
            $is_available = 0;
            foreach ($cart as $key => &$value){
                if($value['product_id']==$data['cart_product_id']){
                    $is_available++;
                    $value['product_qty']+= $data['cart_product_qty'];
                    Session::put('cart', $cart);
                }
                //
            }
            if($is_available == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_id' => $data['cart_product_id'],
                    'product_name' => $data['cart_product_name'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart', $cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('cart', $cart);
        }
        Session::save();

    }
    public function show_cart()
    {
    	$category_product = Category::where('category_status','1')->orderby('category_id', 'asc')->get();
        $brand_product = Brand::where('brand_status','1')->orderby('brand_id', 'asc')->get();

    	return view('pages.cart.show_cart')->with('category', $category_product)->with('brand', $brand_product);
    }
    public function show_cart_ajax()
    {
        $category_product = Category::where('category_status','1')->orderby('category_id', 'asc')->get();
        $brand_product = Brand::where('brand_status','1')->orderby('brand_id', 'asc')->get();

        return view('pages.cart.cart_ajax')->with('category', $category_product)->with('brand', $brand_product);
    }
    public function delete_to_cart($rowId)
    {
    	Cart::update($rowId,0);
    	return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request)
    {
    	$rowId = $request->input('rowId_cart');
    	$qty = $request->input('cart_quantity');
    	Cart::update($rowId, $qty);
    	return Redirect::to('/show-cart');
    }
}
