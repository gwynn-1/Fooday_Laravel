<?php $__env->startSection('content'); ?>
    <div class="page-container">
        <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-menu">
            <div class="container">
                <div class="title-wrapper">
                    <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Tìm kiếm món ăn</div>
                    <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                    <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">The various dishes are waiting for your coming to enjoy its</div>
                </div>
            </div>
        </div>
        <div class="page-content-wrapper">
            <section class="product-sesction-02 padding-top-100 padding-bottom-100 parent" style="height: auto">
                <div class="container">
                    <div class="swin-sc swin-sc-title style-3">
                        <p class="title"><span>Tìm kiếm món ăn</span></p>
                    </div>
                    <div class="swin-sc swin-sc-product products-02 carousel-02 parent" style="height: auto">
                        <div class="row ">
                            <label class="col-md-6 col-md-offset-3">Nhập tên món/đơn giá:<input type="text" value="" class="form-control txtSearch"></label>
                        </div>
                        <div class="products nav-slider margin-top-50 parent" style="height: 0px">
                            <div class="row slick-padding res-food" style="height: 0px">
                                <?php echo $__env->make("Ajax.ajax_search", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(document).keypress(function(e) {
                $(".res-food").css("height","auto");
                $(".slick-list").css("height","auto");
                $(".parent").css("height","auto");
                if(e.which == 13) {
                    $.ajax({
                        method:"GET",
                        url:"/search",
                        data:{
                            search: $(".txtSearch").val()
                        },
                        success:function (data) {
                            $(".res-food").fadeOut(500,function () {
                                $(".res-food").html(data);
                                $(".res-food").fadeIn(500);
                            });

                        }
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>