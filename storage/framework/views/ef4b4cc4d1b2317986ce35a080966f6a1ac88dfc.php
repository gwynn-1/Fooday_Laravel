<?php $__env->startSection('content'); ?>

<div class="page-container">
    <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-product">
        <div class="container">
            <div class="title-wrapper">
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Product Single</div>
                <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">We hope you will like this product and give us 5 star rating</div>
            </div>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="container">
            <section class="product-single padding-top-100 padding-bottom-100">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-image">
                            <div class="product-featured-image">
                                <div class="main-slider">
                                    <div class="slides">
                                        <div class="featured-image-item">
                                            <img src="images/hinh_mon_an/<?php echo e($foodDetail->image); ?>" alt="fooday" class="img img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-summary">
                            <div class="product-title">
                                <div class="title"><?php echo e($foodDetail->name); ?></div>
                            </div>
                            <div class="product-price">
                                <div class="price"><?php echo e($foodDetail->price); ?><span class="currency-symbol">vnđ</span></div>
                            </div>
                            <div class="product-desc">
                                <p><?php echo e($foodDetail->summary); ?></p>
                            </div>
                            <div class="product-quanlity">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" name="quanlity" id="txtQuantity" placeholder="" value="1" class="form-control"><a href="javascript:void(0)" class="quanlity-plus"><i class="fa fa-plus"></i></a><a href="javascript:void(0)" class="quanlity-minus"><i class="fa fa-minus"></i></a>
                                    </div>
                                    <div class="add-to-cart" data-id="<?php echo e($foodDetail->id); ?>"><a href="javascript:void(0)" class="swin-btn"> <span>Add To Cart</span></a></div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <section class="product-related padding-bottom-100">
                <div class="swin-sc swin-sc-title style-2">
                    <p class="title"><span>Món ăn cùng loại</span></p>
                </div>
                <div class="swin-sc swin-sc-product products-02 carousel-01 woocommerce">
                    <div class="products nav-slider">
                        <?php $__currentLoopData = $relatedFoods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="blog-item item swin-transition">
                            <div class="block-img"><img src="images/hinh_mon_an/<?php echo e($food->image); ?>" alt="" style="height: 200px;width: 200px" class="img img-responsive">
                                <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount"><?php echo e($food->price); ?><span class="price-symbol">vnd</span></span></div>
                                <div class="group-btn">
                                    <a href="javascript:void(0)" class="swin-btn btn-link">
                                        <i class="icons fa fa-link"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="swin-btn btn-add-to-card">
                                        <i class="fa fa-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="block-content">
                                <h5 class="title"><a href="detail/<?php echo e($food->id); ?>/<?php echo e($food->url); ?>"><?php echo e($food->name); ?></a></h5>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>