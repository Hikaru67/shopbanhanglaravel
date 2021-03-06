<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-----------------------Seo----------------------------->
    <meta name="google-signin-client_id" content="56662950122-ucbmtnqdouhhc7ls7h28t6guka19n9m6.apps.googleusercontent.com"/>
    <!-----------------------Seo----------------------------->
    <title>Home | E-Shopper</title>
    <link href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/prettyPhoto.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/price-range.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/main.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/responsive.css')); ?>" rel="stylesheet">

    

    


</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +84 372 05x xxx</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> shoppingall4you@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            
                            <a href="<?php echo e(URL::to('/')); ?>"><img src="https://www.allforyou.fr/wp-content/uploads/2020/03/allforyou.png" width="120px" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    $customer_name = Session::get('customer_name');
                                    $shipping_id = Session::get('shipping_id');
                                    if($customer_id&&!$shipping_id){
                                ?>
                                    <li><a href="<?php echo e(URL::to('/checkout')); ?>"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php
                                    }else if($customer_id&&$shipping_id){
                                ?>
                                    <li><a href="<?php echo e(URL::to('/payment')); ?>"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php
                                    }else{
                                ?>
                                    <li><a href="<?php echo e(URL::to('/login-checkout')); ?>"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php
                                    }
                                ?>

                                <li><a href="<?php echo e(URL::to('/gio-hang')); ?>"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                <?php
                                    if($customer_id){
                                ?>
                                    <li><a href="#"><i class="fa fa-user"></i><?php echo e($customer_name); ?></a></li>
                                    <li><a href="/messenger2"><i class="fa fa-comments"></i></i>Messenger</a></li>
                                    <li><a href="<?php echo e(URL::to('/logout-customer')); ?>"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                                <?php
                                    }else{
                                ?>
                                    <li><a href="<?php echo e(URL::to('/login')); ?>"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                <?php
                                    }
                                ?>



                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="<?php echo e(URL::to('/trang-chu')); ?>" class="active">Trang chủ</a></li>
                                
                                
                                <li><a href="<?php echo e(URL::to('/gio-hang')); ?>">Giỏ hàng</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search"/>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

       <?php echo $__env->yieldContent('content'); ?>


    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>e</span>-shopper</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="<?php echo e(URL::to('frontend/images/home/iframe1.png')); ?>" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="<?php echo e(URL::to('frontend/images/home/iframe2.png')); ?>" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="<?php echo e(URL::to('frontend/images/home/iframe3.png')); ?>" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="<?php echo e(URL::to('frontend/images/home/iframe4.png')); ?>" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="<?php echo e(URL::to('frontend/images/home/map.png')); ?>" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>

    </footer><!--/Footer-->

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="<?php echo e(asset('frontend/js/jquery.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/jquery.scrollUp.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/price-range.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/jquery.prettyPhoto.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
        <script type="text/javascript">
            $(document).ready(function (){
                $('.minus').click(function (){
                    let id = $(this).data('product_id');
                    let qty = $('#product_qty_'+id).val();
                    if(qty>1){
                        $('#product_qty_'+id).val(--qty);
                        updateQty(id, qty);
                        updateSubtotal(id);

                    }else {
                        swal({
                            title: "Bạn chắc chắn muốn bỏ sản phẩm này ?",
                            icon: "error",
                            dangerMode: true,
                            buttons: true,
                        })
                            .then((willDelete) => {
                                if (willDelete) {
                                    $('.cart-item_'+id).remove();
                                    updateQty(id, 0);
                                }
                            });
                    }
                });
                $('.plus').click(function (){
                    let id = $(this).data('product_id');
                    let qty = $('#product_qty_'+id).val();
                    $("#product_qty_"+id).val(++qty);
                    updateQty(id, qty);
                    updateSubtotal(id);

                });
                $('input[name="cart_quantity"]').change(function (){
                    let id = $(this).data('product_id');
                    let qty = $('#product_qty_'+id).val();
                    if(qty<=0){
                        swal({
                            title: "Bạn chắc chắn muốn bỏ sản phẩm này ?",
                            icon: "error",
                            dangerMode: true,
                            buttons: true,
                        })
                            .then((willDelete) => {
                                if (willDelete) {
                                    $('.cart-item_'+id).remove();
                                    updateQty(id, 0);
                                }
                            });
                    }else{
                        updateQty(id, qty);
                        updateSubtotal(id);
                    }
                })
                $('.cart_quantity_delete').click(function (){
                    let id = $(this).data('product_id');
                    swal({
                        title: "Bạn chắc chắn muốn bỏ sản phẩm này ?",
                        icon: "error",
                        dangerMode: true,
                        buttons: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                $('.cart-item_'+id).remove();
                                updateQty(id, 0);
                            }
                        });
                })
            })

            function updateQty(id, qty){
                $.ajax({
                    url: '/update-cart-qty',
                    method: 'POST',
                    data:{
                        cart_product_id: id,
                        cart_product_qty: qty,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                })
            }

            function updateSubtotal(id){
                let qty = $('#product_qty_'+id).val();
                let price = $('#product_price_'+id).val();
                $('.cart_subtotal_'+id).html(formatNumber(price*qty)+' ₫');
                // updateTotal();
            }

            function updateTotal(){

            }

        </script>
</body>
</html>
<?php /**PATH /home/hikaru/learn-php/shopbanhanglaravel/resources/views/layout2.blade.php ENDPATH**/ ?>