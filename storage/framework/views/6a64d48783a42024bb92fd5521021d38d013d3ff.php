<?php $__env->startSection('admin_content'); ?>
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title"><center>Cập nhật sản phẩm</center></h4>
            <?php
				$message = Session::get('message');
				if($message){
					echo '<span class="text-alert">'.$message.'</span>';
					Session::put('message', null);
					echo '<br>';
				}
			?>
            <?php $__currentLoopData = $edit_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $edit_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <form action="<?php echo e(URL::to('/update-product/'.$edit_value->product_id)); ?>" method="post" enctype="multipart/form-data">
            	<?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="product_name">Tên sản phẩm</label>
                    <input type="text" name="product_name" class="form-control" id="product_name" aria-describedby="emailHelp" placeholder="Tên" value="<?php echo e($edit_value->product_name); ?>">
                </div>
                <div class="form-group">
                    <label for="product_price">Giá sản phẩm</label>
                    <input type="text" name="product_price" value="<?php echo e($edit_value->product_price); ?>" class="form-control" id="product_name" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="product_image">Hình ảnh sản phẩm</label>
                    <input type="file" name="product_image" value="<?php echo e($edit_value->product_image); ?>" class="form-control" id="product_name" aria-describedby="emailHelp">
                    <input type="text" name="product_image_old" value="<?php echo e($edit_value->product_image); ?>" class="form-control" id="product_name" hidden>
                    <img src="<?php echo e(URL::to('uploads/product/'.$edit_value->product_image)); ?>" height="100" width="100">
                </div>
                <div class="form-group">
                    <label for="product_desc">Mô tả sản phẩm</label>
                    <textarea style="resize: none" rows="8" name="product_desc" class="form-control" id="ckeditor"><?php echo e($edit_value->product_desc); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="product_content">Nội dung sản phẩm</label>
                    <textarea style="resize: none" rows="8" name="product_content" class="form-control" id="ckeditor2"><?php echo e($edit_value->product_content); ?></textarea>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Danh mục sản phẩm</label>
                    <select name="product_category" class="form-control">
                        <?php $__currentLoopData = $category_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cate->category_id==$edit_value->category_id){ ?>
                                <option value="<?php echo e($cate->category_id); ?>" selected><?php echo e($cate->category_name); ?></option>
                            <?php } else {?>
                            <option value="<?php echo e($cate->category_id); ?>"><?php echo e($cate->category_name); ?></option>
                            <?php } ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Thương hiệu</label>
                    <select name="product_brand" onselect="<?php echo e($edit_value->product_name); ?>" class="form-control">
                        <?php $__currentLoopData = $brand_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($brand->brand_id==$edit_value->brand_id){ ?>
                                <option value="<?php echo e($brand->brand_id); ?>" selected><?php echo e($brand->brand_name); ?></option>
                            <?php } else {?>
                            <option value="<?php echo e($brand->brand_id); ?>"><?php echo e($brand->brand_name); ?></option>
                            <?php } ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <button type="submit" name="add_product" class="btn btn-primary mt-4 pr-4 pl-4">Cập nhật</button>
            </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hikaru/learn-php/shopbanhanglaravel/resources/views/admin/edit_product.blade.php ENDPATH**/ ?>