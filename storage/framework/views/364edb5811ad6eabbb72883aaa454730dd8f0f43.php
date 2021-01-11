<?php $__env->startSection('content'); ?>
    <?php
        if(!Cart::count()){
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
				<?php
					$content = Cart::content();
				?>
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
						<?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="cart_product " >
								<a href=""><img src="<?php echo e(URL::to('uploads/product/'.$value->options->image)); ?>" width="50" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo e($value->name); ?></a></h4>
								<p>ID sản phẩm: <?php echo e($value->id); ?></p>
							</td>
							<td class="cart_price">
								<p><?php echo e(number_format($value->price)); ?> VNĐ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="<?php echo e(URL::to('/update-cart-quantity')); ?>">
									<?php echo e(csrf_field()); ?>

									<input class="cart_quantity_input" type="text" name="cart_quantity" value="<?php echo e($value->qty); ?>" size="2">
									<input type="text" value="<?php echo e($value->rowId); ?>" name="rowId_cart" hidden="">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm"></button>
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo e(number_format($value->price * $value->qty)); ?> VNĐ</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo e(URL::to('/delete-to-cart/'.$value->rowId)); ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
				
				<div class="col-sm-6">
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span><?php echo e(Cart::subtotal()); ?></span></li>
							<li>Thuế <span><?php echo e(Cart::Tax()); ?></span></li>
							<li>Phí ship <span>Free</span></li>
							<li>Thành tiền <span><?php echo e(Cart::total()); ?></span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<?php
								$customer_id = Session::get('customer_id');
                                $shipping_id = Session::get('shipping_id');
                                if($customer_id&&!$shipping_id){
                            ?>
                                <a class="btn btn-default update" href="<?php echo e(URL::to('/checkout')); ?>"> Thanh toán</a>
                            <?php
                                }else if($customer_id&&$shipping_id){
                            ?>
                                <a class="btn btn-default update" href="<?php echo e(URL::to('/payment')); ?>"> Thanh toán</a>
                            <?php
                                }else{
                            ?>
                                <a class="btn btn-default update" href="<?php echo e(URL::to('/login-checkout')); ?>"> Thanh toán</a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hikaru/learn-php/shopbanhanglaravel/resources/views/pages/cart/show_cart.blade.php ENDPATH**/ ?>