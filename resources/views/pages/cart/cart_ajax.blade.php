@extends('layout2')
@section('content')
    <?php
    if(!Session::get('cart')){
    ?>
    <div class="container">
        <div class="col-sm-4"></div>
        <div class="cart-info table-responsive col-sm-4">
            <div class="cart-empty-text">There are no items in this cart</div>
            <a href="/">
                <button type="button" class="btn next-btn-secondary next-btn-large">CONTINUE SHOPPING</button>
            </a>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <br><br>
    <?php
    }else{
    ?>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
            </div>
            <div class="table-responsive cart_info">
                @php
                    $content = Session::get('cart')
                @endphp
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Thành tiền</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total = 0; $value = '';?>
                    @foreach($content as $key => $value)

                        <tr class="cart-item_{{$value['product_id']}}">
                            <?php
                                $subtotal = $value['product_price']*$value['product_qty'];
                                $total += $subtotal;
                            ?>
                            <td class="cart_product " >
                                <a href=""><img src="{{URL::to('uploads/product/'.$value['product_image'])}}" width="50" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$value['product_name']}}</a></h4>
                                <p>ID sản phẩm: {{$value['product_id']}}</p>
                            </td>
                            <td class="cart_price">
                                <p id="product_price">{{number_format($value['product_price'])}} ₫</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    {{--<form action="{{URL::to('/update-cart-quantity')}}">--}}
{{--                                    <form method="POST">--}}
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product_price" id="product_price_{{$value['product_id']}}" value="{{$value['product_price']}}">
{{--                                    <input type="hidden" name="product_price" id="product_price_{{$value['product_id']}}" value="{{$value['product_price']}}">--}}
                                    <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default minus" data-product_id="{{$value['product_id']}}"><i class="fa fa-minus"></i></button>
                                        <input class="btn btn-default cart-quantity" type="text" data-product_id="{{$value['product_id']}}" name="cart_quantity" id="product_qty_{{$value['product_id']}}" value="{{$value['product_qty']}}" onchange="test()" size="2">
                                        <button type="button" class="btn btn-default plus" data-product_id="{{$value['product_id']}}"><i class="fa fa-plus"></i></button>
                                    </div>
{{--                                        <input type="text" value="{{$value->rowId}}" name="rowId_cart" hidden="">--}}
                                    {{--<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm"></button>--}}
{{--                                    </form>--}}
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_subtotal_{{$value['product_id']}}">{{ number_format($value['product_price'] * $value['product_qty'])}} ₫</p>
                            </td>
                            <td class="cart_delete">
                                <button type="button" class="cart_quantity_delete" data-product_id="{{$value['product_id']}}"><i class="fa fa-times"></i></button>
{{--                                <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$value['product_id'])}}"></a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                {{-- <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div> --}}
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Tổng <span>{{number_format($total)}} ₫</span></li>
                            <li>Thuế <span>{{0}}</span></li>
                            <li>Phí ship <span>Free</span></li>
                            <li>Thành tiền <span>{{number_format($total)}} ₫</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <?php
                        $customer_id = Session::get('customer_id');
                        $shipping_id = Session::get('shipping_id');
                        if($customer_id&&!$shipping_id){
                        ?>
                        <a class="btn btn-default update" href="{{URL::to('/checkout')}}"> Thanh toán</a>
                        <?php
                            }else if($customer_id&&$shipping_id){
                        ?>
                        <a class="btn btn-default update" href="{{URL::to('/payment')}}"> Thanh toán</a>
                        <?php
                        }else{
                        ?>
                        <a class="btn btn-default update" href="{{URL::to('/login-checkout')}}"> Thanh toán</a>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
    <?php
    }
    ?>
@endsection
