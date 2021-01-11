<?php $__env->startSection('content'); ?>

<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Kết quả tìm kiếm</h2>

    <?php $__currentLoopData = $search_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(URL::to('/chi-tiet-san-pham/'.$product->product_id)); ?>" title="">
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="<?php echo e(URL::to('uploads/product/'.$product->product_image)); ?>" height="250" alt="" />
                        <h2><?php echo e(number_format($product->product_price).' VNĐ'); ?></h2>
                        <p><?php echo e($product->product_name); ?></p>
                        <form action="#">
                            <a  class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                        </form>

                    </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào yêu thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào so sánh</a></li>
                </ul>
            </div>
        </div>
    </div>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div><!--features_items-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hikaru/learn-php/shopbanhanglaravel/resources/views/pages/product/search.blade.php ENDPATH**/ ?>