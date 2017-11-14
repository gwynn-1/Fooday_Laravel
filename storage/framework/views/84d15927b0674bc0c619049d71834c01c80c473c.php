<?php $__env->startSection('content'); ?>
    <div class="page-container">
        <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-menu">
            <div class="container">
                <div class="title-wrapper">
                    <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Thực đơn</div>
                    <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                    <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">The various dishes are waiting for your coming to enjoy its</div>
                </div>
            </div>
        </div>
        <div class="page-content-wrapper">
            <section class="product-sesction-menu padding-bottom-100 padding-top-100">
                <?php echo $__env->make("Ajax.ajax_detailmenu", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </section>
            <section class="menu-grid-02 padding-bottom-100">
                <div class="container">
                    <div class="swin-sc swin-sc-product products-01 style-03 woocommerce">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="products nav-slider">
                                    <div class="item-slick">
                                        <div class="row">
                                            <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-2 col-sm-4 col-xs-12">
                                                <div class="item product-01">
                                                    <div class="block-img"><img src="images/thuc_don/<?php echo e($mn->image); ?>" alt="">
                                                        <div class="group-btn"><a href="<?php echo e($mn->id); ?>" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                                                    </div>
                                                    <a href="<?php echo e($mn->id); ?>" class="ajax-menu" ><h5 class="title"><?php echo e($mn->name); ?></h5><span class="price woocommerce-Price-amount amount"><?php echo e($mn->price); ?><span class="price-symbol">vnd</span></span></a>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="menu-banner-section banner-section padding-top-100 padding-bottom-100"><img src="<?php echo e(URL::asset("images/background/lemon.png")); ?>" alt="" class="img-left img-bg img-deco img-responsive"><img src="<?php echo e(URL::asset("images/background/vegetable_03.png")); ?>" alt="" class="img-right img-bg img-deco img-responsive">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="content-wrapper">
                                <h2 class="heading-title">Let's Make Your Meal be Fantastic With<span class="text-large"> FOODAY</span>Awesome Menu!</h2>
                                <div class="swin-btn-wrap"><a href="#" class="swin-btn"><span>Book Table</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                function Ajax(idmenu) {
                    $.ajax({
                        url: "/menu",
                        method:"GET",
                        data:{
                            idmenu:idmenu
                        }
                    }).done(function(data){
                        $(".product-sesction-menu").html(data);
                    });
                }

                $(document).ready(function () {
                   $(".ajax-menu").click(function (e) {
                       e.preventDefault();
                       Ajax($(this).attr("href"));
                   });

                   $(".btn-link").click(function (e) {
                       e.preventDefault();
                       Ajax($(this).attr("href"));
                   });
                });
            </script>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>