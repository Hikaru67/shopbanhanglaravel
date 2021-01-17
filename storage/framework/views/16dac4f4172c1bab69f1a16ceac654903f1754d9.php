<?php $__env->startSection('content'); ?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo e(URL::to('/')); ?>">Trang chủ</a></li>
				  <li class="active">Thanh toán</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			

			<div class="register-req">
				<p>Vui lòng sử dụng Đăng nhập và Thanh toán để dễ dàng truy cập vào lịch sử đơn đặt hàng của bạn</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Thông tin gửi hàng</p>
							<div class="form-one">
								<form action="<?php echo e(URL::to('/save-checkout-customer')); ?>" method="post">
									<?php echo e(csrf_field()); ?>

									<input type="email" name="shipping_email" placeholder="Email*">
									<input type="text" name="shipping_name" placeholder="Họ và tên *">
									<input type="text" name="shipping_address" placeholder="Địa chỉ *">
									<input type="text" name="shipping_phone" placeholder="Số điện thoại *">
									<p>Ghi chú gửi hàng</p>
									<textarea name="shipping_notes"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
									<input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm"></button>
									</form>

							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section> <!--/#cart_items-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hikaru/learn-php/shopbanhanglaravel/resources/views/pages/checkout/show_checkout.blade.php ENDPATH**/ ?>