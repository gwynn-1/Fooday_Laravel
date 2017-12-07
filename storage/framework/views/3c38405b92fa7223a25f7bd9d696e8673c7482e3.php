<?php $__env->startSection('content'); ?>
    <div class="page-container">
        <div class="top-header top-bg-parallax">
            <div data-parallax="scroll" data-image-src="images/slider/slider2-bg1.jpg" class="slides parallax-window">
                <div class="slide-content slide-layout-02">
                    <div class="container">
                        <div class="slide-content-inner"><img src="images/slider/slider2-icon.png" data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="500" alt="fooday" class="slide-icon img img-responsive animated">
                            <h3 data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1000" class="slide-title animated">FOODAY RESTAURANT</h3>
                            <p data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1500" class="slide-sub-title animated"><span class="line-before"></span><span class="line-after"></span><span class="text"><span>Tasty</span><span>Delicious</span><span>Savoury</span></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($error=="success"): ?>
        <div class="alert alert-success">
            <?php echo e($message); ?>

        </div>
        <?php elseif($error=="error"): ?>
            <div class="alert alert-danger">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>
        <div class="bt-wrapper"><a href="/contact" class="swin-btn center"> <span>Get Help</span></a><a href="/" class="swin-btn center btn-transparent btn-right"> <span>Back Home</span></a></div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>