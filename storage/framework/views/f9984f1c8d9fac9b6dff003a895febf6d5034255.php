<?php $__env->startSection('admin_content'); ?>

<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Quản lý đơn hàng</h4>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message', null);
                    echo '<br>';
                }
            ?>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên người đặt hàng</th>
                                <th scope="col">Tổng giá tiền</th>
                                <th scope="col">Trạng thái</th>
                                
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $all_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($order->order_id); ?></th>
                                <td><?php echo e($order->customer_name); ?></td>
                                <td><span class="text"><?php echo e($order->order_total); ?></span></td>
                                <td>
                                    <span class="text">
                                        <?php
                                            if($order->order_status == 0){
                                        ?>
                                                Đang xử lý</span>
                                        <?php   }
                                            else{
                                        ?>
                                                </span>
                                        <?php   }   ?>
                                    </span>
                                </td>
                                
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="<?php echo e(URL::to('/view-order/'.$order->order_id)); ?>" class="text-secondary"><i class="fas fa-eye"></i></i></a></li>
                                        <li><a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không ?');" href="<?php echo e(URL::to('/delete-order/'.$order->order_id)); ?>" class="text-danger"><i class="ti-trash"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($all_order->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hikaru/learn-php/shopbanhanglaravel/resources/views/admin/manage_order.blade.php ENDPATH**/ ?>