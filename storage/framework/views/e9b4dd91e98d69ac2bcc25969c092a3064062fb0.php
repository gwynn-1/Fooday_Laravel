
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="swin-sc swin-sc-title style-3">
                    <p class="title"><span><?php echo e($def_detailmenu[0]->name); ?></span></p>
                </div>
                <div class="swin-sc swin-sc-product products-01 style-02 woocommerce">

                    <div class="row">
                        <div class="nav-slider">
                            <div class="tab-content">
                                <div class="col-md-5 col-sm-12">
                                    <div class="cat-wrapper">
                                        <div class="item"><img src="images/thuc_don/<?php echo e($def_detailmenu[0]->image); ?>" alt="" class="img img-responsive img-full"></div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <div class="products">
                                        <?php $__currentLoopData = $def_detailmenu_food; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item product-01">
                                            <div class="item-left">
                                                <h5 class="title"><?php echo e($food->name); ?></h5>
                                                <div class="des"><?php echo $food->detail; ?></div>
                                            </div>
                                            <div class="item-right"><span class="price woocommerce-Price-amount amount"><?php echo e($food->price); ?><span class="price-symbol">vnd</span></span></div>
                                        </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>