<?php $__env->startSection('admin_content'); ?>
<div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Progress Table</h4>
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
                                                    <th scope="col">Tên thương hiệu</th>
                                                    <th scope="col">Trạng thái</th>
                                                    
                                                    <th scope="col">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $all_brand_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $bra_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th scope="row"><?php echo e($bra_pro->brand_id); ?></th>
                                                    <td><?php echo e($bra_pro->brand_name); ?></td>
                                                    <td>
                                                        <span class="text">
                                                            <?php
                                                                if($bra_pro->brand_status == 1){
                                                            ?>
                                                                    <a href="<?php echo e(URL::to('/unactive-brand-product/'.$bra_pro->brand_id)); ?>"><span class="fa-thums-styling fa fa-thumbs-up"></span></a>
                                                            <?php   }
                                                                else{
                                                            ?>
                                                                    <a href="<?php echo e(URL::to('/active-brand-product/'.$bra_pro->brand_id)); ?>"><span class="fa-thums-styling fa fa-thumbs-down"></span></a>
                                                            <?php   }   ?>
                                                        </span>
                                                    </td>
                                                    
                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3"><a href="<?php echo e(URL::to('/edit-brand-product/'.$bra_pro->brand_id)); ?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                            <li><a onclick="return confirm('Bạn có chắc là muốn xóa thương hiệu này không ?');" href="<?php echo e(URL::to('/delete-brand-product/'.$bra_pro->brand_id)); ?>" class="text-danger"><i class="ti-trash"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                        <?php echo e($all_brand_product->links()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hikaru/learn-php/shopbanhanglaravel/resources/views/admin/all_brand_product.blade.php ENDPATH**/ ?>