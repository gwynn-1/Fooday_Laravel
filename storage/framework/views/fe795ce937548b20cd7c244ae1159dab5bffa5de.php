<?php $__env->startSection('content'); ?>

<div class="page-container">
    <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-reservation">
        <div class="container">
            <div class="title-wrapper">
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Giỏ hàng của bạn</div>
                <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">Just a few click to make the reservation online for saving your time and money</div>
            </div>
        </div>
    </div>
    <div class="page-content-wrapper">
        <section class="section-reservation-form padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="section-content cart-container">
                    <?php if(!session('success')): ?>

                    <?php if(count($arr_cart["items"]) !=0): ?>
                    <div class="swin-sc swin-sc-title style-2">
                        <h3 class="title"><span>Chi tiết giỏ hàng</span></h3>
                    </div>
                    <div class="reservation-form">
                        <div class="swin-sc swin-sc-contact-form light mtl">
                            <table class="table table-striped" style="text-align: center;">
                                <thead>
                                <tr>
                                    <th width="30%" style="text-align: center;">Product</th>
                                    <th width="20%" style="text-align: center;">Price</th>
                                    <th width="20%" style="text-align: center;">Qty.</th>
                                    <th width="20%" style="text-align: center;">Total</th>
                                    <th width="10%" style="text-align: center;">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $arr_cart["items"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="item-<?php echo e($cart_item->id); ?>">
                                    <td>
                                        <img src="images/hinh_mon_an/<?php echo e($cart_item->image); ?>" width="250px">
                                        <p><br><b><?php echo e($cart_item->name); ?></b></p>
                                    </td>
                                    <td><?php echo e($cart_item->price); ?></td>
                                    <td>
                                        <select name="product-qty" class="form-control product-qty" width="50" id-row="<?php echo e($key); ?>" id-data="<?php echo e($cart_item->id); ?>">
                                            <?php for($i=1;$i<=10;$i++): ?>
                                            <option value="<?php echo e($i); ?>" <?php if($i==$cart_item->quantity): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </td>
                                    <td id="total-price-<?php echo e($cart_item->id); ?>"><?php echo e($cart_item->price*$cart_item->quantity); ?></td>
                                    <td><a href="javascript:void(0)" class="remove" id-row="<?php echo e($key); ?>" title="Remove this item"><i class="fa fa-trash-o fa-2x"></i></a></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                   <td colspan="5" class="Total-price" style="text-align: right;font-size: 16px;font-weight: bold;">Tổng cộng <span><?php echo e($arr_cart["total"]); ?></span></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="swin-sc swin-sc-contact-form light mtl style-full">
                            <div class="swin-sc swin-sc-title style-2">
                                <h3 class="title"><span>Đặt hàng</span></h3>
                            </div>
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($err); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <form action="checkout" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" name="fullname" required placeholder="Fullname" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-2">Giới tính</div>
                                <div class="col-sm-10">
                                    <label> Nam
                                        <input type="radio" name="gender"  value="nam" checked>
                                    </label>
                                    <label> Nữ
                                        <input type="radio" name="gender" value="nữ">
                                    </label>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="email" required name="email" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <div class="fa fa-map-marker"></div>
                                        </div>
                                        <input required type="text" name="address" placeholder="Address" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <div class="fa fa-phone"></div>
                                        </div>
                                        <input required type="number" name="phone" placeholder="Phone" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea name="message" placeholder="Message" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="swin-btn-wrap center"><button type="submit" class="swin-btn center form-submit"><span>Checkout</span></button></div>
                                </div>
                            </form>

                        </div>
                    </div>


                    <?php else: ?>
                        <h3 class="title" style="text-align:center"><span>Bạn chưa mua sản phẩm nào</span></h3>
                        <?php echo e(header("refresh: 10; url=/")); ?>


                    <?php endif; ?>
                    <?php else: ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <section data-bottom-top="background-position: 50% 100px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" class="section-reservation-service padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="section-content">
                    <div class="swin-sc swin-sc-title style-2 light">
                        <h3 class="title"><span>Fooday Best Service</span></h3>
                    </div>
                    <div class="swin-sc swin-sc-iconbox light">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="item icon-box-02 wow fadeInUpShort">
                                    <div class="wrapper-icon"><i class="icons swin-icon-dish"></i><span class="number">1</span></div>
                                    <h4 class="title">Reservation</h4>
                                    <div class="description">Lorem ipsum dolor sit amet, tong consecteturto sed eiusmod incididunt utote labore et</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div data-wow-delay="0.5s" class="item icon-box-02 wow fadeInUpShort">
                                    <div class="wrapper-icon"><i class="icons swin-icon-dinner-2"></i><span class="number">2</span></div>
                                    <h4 class="title">Private Event</h4>
                                    <div class="description">Lorem ipsum dolor sit amet, tong consecteturto sed eiusmod incididunt utote labore et</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div data-wow-delay="1s" class="item icon-box-02 wow fadeInUpShort">
                                    <div class="wrapper-icon"><i class="icons swin-icon-browser"></i><span class="number">3</span></div>
                                    <h4 class="title">Online Order</h4>
                                    <div class="description">Lorem ipsum dolor sit amet, tong consecteturto sed eiusmod incididunt utote labore et</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div data-wow-delay="1.5s" class="item icon-box-02 wow fadeInUpShort">
                                    <div class="wrapper-icon"><i class="icons swin-icon-delivery"></i><span class="number">4</span></div>
                                    <h4 class="title">Fast Delivery</h4>
                                    <div class="description">Lorem ipsum dolor sit amet, tong consecteturto sed eiusmod incididunt utote labore et</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
    <script>
        $(document).ready(function () {
           $(".product-qty").change(function () {
               var id = $(this).attr("id-data");
              $.ajax({
                  method:"post",
                  data:{
                      id:$(this).attr("id-row"),
                      qty:$(this).val(),
                      action:"update"
                  }
              }).done(function(data){
                  var totalpricecart = parseInt($(".Total-price span").html());
                  var totalpriceitem = parseInt($("#total-price-"+id).html());
                  $(".Total-price span").html(totalpricecart-totalpriceitem);
                  $("#total-price-"+id).html(data);
                  totalpricecart = parseInt($(".Total-price span").html());
                  totalpriceitem = parseInt($("#total-price-"+id).html());
                  $(".Total-price span").html(totalpricecart+totalpriceitem);
              });
           });

           $(".remove").click(function () {
              var idrow = $(this).attr("id-row");
              $.ajax({
                  method:"post",
                  data:{
                      id:idrow,
                      action:"delete"
                  }
              }).done(function(data){
                    var totalpriceitem=parseInt($("#total-price-"+data['id']).html());
                    var totalpricecart = parseInt($(".Total-price span").html());
                    $("#item-"+data['id']).remove();
                    $(".Total-price span").html(totalpricecart-totalpriceitem);
                    if(data['count']==0){
                        $(".cart-container").html('<h3 class="title" style="text-align:center"><span>Bạn chưa mua sản phẩm nào</span></h3>');
                        setTimeout(function(){
                            window.location.href = "/"
                        },10000);
                    }
              });
           });


        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>