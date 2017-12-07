<div class="products nav-slider">
    <div class="row slick-padding">
        <?php $__currentLoopData = $foodpaging; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="blog-item item swin-transition">
                    <div class="block-img"><img src="images/hinh_mon_an/<?php echo e($f->image); ?>" alt="" style="width: 200px;height: 200px" class="img img-responsive">
                        <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount"><?php echo e($f->price); ?> <span class="price-symbol">vnd</span></span></div>
                        <div class="group-btn"><a href="detail/<?php echo e($f->id); ?>/<?php echo e($f->url); ?>" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card" data-id="<?php echo e($f->id); ?>"><i class="fa fa-shopping-basket"></i></a></div>
                    </div>
                    <div class="block-content">
                        <h5 class="title"><a href="detail/<?php echo e($f->id); ?>/<?php echo e($f->url); ?>"><?php echo e($f->name); ?></a></h5>
                        <div class="product-info"><?php echo e($f->summary); ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php echo $__env->make("Pagination.limit-link",["paginator"=>$foodpaging], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
