<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<!-- Mirrored from swin-themes.com/html/fooday/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Sep 2017 09:09:44 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <base href="{{URL::asset("")}}">
    <!-- Bootstrap CSS-->
    <link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome-->

    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!-- IE 9-->
    <!-- Vendors-->
    <link rel="stylesheet" href="vendors/flexslider/flexslider.min.css">
    <link rel="stylesheet" href="vendors/swipebox/css/swipebox.min.css">
    <link rel="stylesheet" href="vendors/slick/slick.min.css">
    <link rel="stylesheet" href="vendors/slick/slick-theme.min.css">
    <link rel="stylesheet" href="vendors/animate.min.css">
    <link rel="stylesheet" href="vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="vendors/pageloading/css/component.min.css">
    <!-- Font-icon-->
    <link rel="stylesheet" href="fonts/font-icon/style.css">
    <!-- Style-->
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/elements.css">
    <link rel="stylesheet" type="text/css" href="css/extra.css">
    <link rel="stylesheet" type="text/css" href="css/widget.css">
    <link id="colorpattern" rel="stylesheet" type="text/css" href="css/color/colordefault.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/live-settings.css">
    <!-- Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet">
    <!-- Script Loading Page-->
    <script src="vendors/html5shiv.js"></script>
    <script src="vendors/respond.min.js"></script>
    <script src="vendors/pageloading/js/snap.svg-min.js"></script>
    <script src="vendors/pageloading/sidebartransition/js/modernizr.custom.js"></script>
</head>
<body>
<div id="pagewrap" class="pagewrap">
    <div id="html-content" class="wrapper-content">
        <header class="header-transparent">
            <div class="header-top top-layout-02">
                <div class="container">
                    <div class="topbar-left">
                        <div class="topbar-content">
                            <div class="item">
                                <div class="wg-contact"><i class="fa fa-map-marker"></i><span>90-92 Lê Thị Riêng, Bến Thành, Quận 1</span></div>
                            </div>
                            <div class="item">
                                <div class="wg-contact"><i class="fa fa-phone"></i><span>0163 296 7751</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="topbar-right">
                        <div class="topbar-content">
                            <div class="item">
                                <ul class="socials-nb list-inline wg-social">
                                    <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                            <div class="item">
                                <div class="wg-social"><a href="checkout.php"><i class="fa fa-shopping-cart fa-2x"></i><span>Shopping Cart</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-main">
                <div class="container">
                    <div class="open-offcanvas">&#9776;</div>

                    <div class="header-logo"><a href="index.php" class="logo logo-static"><img src="images/logo-white.png" alt="fooday" class="logo-img"></a><a href="index.html" class="logo logo-fixed"><img src="images/logo.png" alt="fooday" class="logo-img"></a></div>
                    <script src="vendors/jquery-1.10.2.min.js"></script>
                    <script>
                        $(function() {
                            var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
                            if (pgurl=="") pgurl="." ;
                            $("#main-nav li").each(function(){
                                if($('a', this).attr("href") == pgurl || $(this).children("a").attr("href") == '' )
                                    $(this).addClass("current-menu-item");

                            })
                        });
                    </script>
                    <nav id="main-nav-offcanvas" class="main-nav-wrapper">
                        <div class="close-offcanvas-wrapper"><span class="close-offcanvas">x</span></div>
                        <div class="main-nav">
                            <ul id="main-nav" class="nav nav-pills">
                                <li><a class="current-menu-item" href="../">Home</a></li>
                                <li><a href="ds-thuc-don.html">Thực đơn</a></li>
                                <li><a href="mon-an-theo-mua.html">Món ăn theo mùa</a></li>
                                <li><a href="tim-kiem.html">Tìm kiếm</a></li>
                                <li><a href="about.html">Giới thiệu</a></li>
                                <li><a href="contact.html">Liên hệ</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
            @yield('content')
        <footer>
            <div class="footer-top"></div>
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="ft-widget-area">
                                <div class="ft-area1">
                                    <div class="swin-wget swin-wget-about">
                                        <div class="clearfix"><a class="wget-logo"><img src="images/logo-ft.png" alt="" class="img img-responsive"></a>
                                            <ul class="socials socials-about list-unstyled list-inline">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="wget-about-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat Duis aute irure dolor.</p>
                                        </div>
                                        <div class="about-contact-info clearfix">
                                            <div class="address-info">
                                                <div class="info-icon"><i class="fa fa-map-marker"></i></div>
                                                <div class="info-content">
                                                    <p>90-92 Lê Thị Riêng</p>
                                                    <p>Bến Thành, Quận 1</p>
                                                </div>
                                            </div>
                                            <div class="phone-info">
                                                <div class="info-icon"><i class="fa fa-mobile-phone"></i></div>
                                                <div class="info-content">
                                                    <p>094 276 4080</p>
                                                    <p>0163 296 7751</p>
                                                </div>
                                            </div>
                                            <div class="email-info">
                                                <div class="info-icon"><i class="fa fa-envelope"></i></div>
                                                <div class="info-content">
                                                    <p>huongnguyenak96@gmail.com</p>
                                                    <p>khoaphamtraining@gmail.com</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ft-fixed-area">
                                <div class="reservation-box">
                                    <div class="reservation-wrap">
                                        <h3 class="res-title">Mở cửa</h3>
                                        <div class="res-date-time">
                                            <div class="res-date-time-item">
                                                <div class="res-date">
                                                    <div class="res-date-item">
                                                        <div class="res-date-text">
                                                            <p>Tuesday:</p>
                                                        </div>
                                                        <div class="res-date-dot">.......................................</div>
                                                    </div>
                                                </div>
                                                <div class="res-time">
                                                    <div class="res-time-item">
                                                        <p>7AM - 9PM</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="res-date-time-item">
                                                <div class="res-date">
                                                    <div class="res-date-item">
                                                        <div class="res-date-text">
                                                            <p>Wednesday:</p>
                                                        </div>
                                                        <div class="res-date-dot">.......................................</div>
                                                    </div>
                                                </div>
                                                <div class="res-time">
                                                    <div class="res-time-item">
                                                        <p>7AM - 9PM</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="res-date-time-item">
                                                <div class="res-date">
                                                    <div class="res-date-item">
                                                        <div class="res-date-text">
                                                            <p>Thursday:</p>
                                                        </div>
                                                        <div class="res-date-dot">.......................................</div>
                                                    </div>
                                                </div>
                                                <div class="res-time">
                                                    <div class="res-time-item">
                                                        <p>7AM - 9PM</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="res-date-time-item">
                                                <div class="res-date">
                                                    <div class="res-date-item">
                                                        <div class="res-date-text">
                                                            <p>Friday:</p>
                                                        </div>
                                                        <div class="res-date-dot">.......................................</div>
                                                    </div>
                                                </div>
                                                <div class="res-time">
                                                    <div class="res-time-item">
                                                        <p>7AM - 9PM</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="res-date-time-item">
                                                <div class="res-date">
                                                    <div class="res-date-item">
                                                        <div class="res-date-text">
                                                            <p>Saturday:</p>
                                                        </div>
                                                        <div class="res-date-dot">.......................................</div>
                                                    </div>
                                                </div>
                                                <div class="res-time">
                                                    <div class="res-time-item">
                                                        <p>7AM - 9PM</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="res-date-time-item">
                                                <div class="res-date">
                                                    <div class="res-date-item">
                                                        <div class="res-date-text">
                                                            <p>Sunday:</p>
                                                        </div>
                                                        <div class="res-date-dot">.......................................</div>
                                                    </div>
                                                </div>
                                                <div class="res-time">
                                                    <div class="res-time-item">
                                                        <p>7AM - 9PM</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="res-date-time-item">
                                                <div class="res-date">
                                                    <div class="res-date-item">
                                                        <div class="res-date-text">
                                                            <p>Monday:</p>
                                                        </div>
                                                        <div class="res-date-dot">.......................................</div>
                                                    </div>
                                                </div>
                                                <div class="res-time">
                                                    <div class="res-time-item">
                                                        <p>Close</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <h3 class="res-title">Booking</h3>
                                        <p class="res-number">094 276 4080</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <p>Đặt hàng thành công</p>
                        <p>Đã thêm <span id="tensp"></span> vào giỏ hàng</p>
                        <a href="checkout.php">Xem giỏ hàng</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <a id="totop" href="#" class="animated"><i class="fa fa-angle-double-up"></i></a>
    </div>
    <div id="loader" data-opening="m -5,-5 0,70 90,0 0,-70 z m 5,35 c 0,0 15,20 40,0 25,-20 40,0 40,0 l 0,0 C 80,30 65,10 40,30 15,50 0,30 0,30 z" class="pageload-overlay">
        <div class="loader-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 80 60" preserveaspectratio="none">
                <path d="m -5,-5 0,70 90,0 0,-70 z m 5,5 c 0,0 7.9843788,0 40,0 35,0 40,0 40,0 l 0,60 c 0,0 -3.944487,0 -40,0 -30,0 -40,0 -40,0 z"></path>
            </svg>
            <div class="sk-circle">
                <div class="sk-circle1 sk-child"></div>
                <div class="sk-circle2 sk-child"></div>
                <div class="sk-circle3 sk-child"></div>
                <div class="sk-circle4 sk-child"></div>
                <div class="sk-circle5 sk-child"></div>
                <div class="sk-circle6 sk-child"></div>
                <div class="sk-circle7 sk-child"></div>
                <div class="sk-circle8 sk-child"></div>
                <div class="sk-circle9 sk-child"></div>
                <div class="sk-circle10 sk-child"></div>
                <div class="sk-circle11 sk-child"></div>
                <div class="sk-circle12 sk-child"></div>
            </div>
            <div class="sk-circle sk-circle-out">
                <div class="sk-circle1 sk-child"></div>
                <div class="sk-circle2 sk-child"></div>
                <div class="sk-circle3 sk-child"></div>
                <div class="sk-circle4 sk-child"></div>
                <div class="sk-circle5 sk-child"></div>
                <div class="sk-circle6 sk-child"></div>
                <div class="sk-circle7 sk-child"></div>
                <div class="sk-circle8 sk-child"></div>
                <div class="sk-circle9 sk-child"></div>
                <div class="sk-circle10 sk-child"></div>
                <div class="sk-circle11 sk-child"></div>
                <div class="sk-circle12 sk-child"></div>
            </div>
        </div>
    </div>

</div>
<!-- jQuery-->
<script src="vendors/jquery-1.10.2.min.js"></script>
<!-- Bootstrap JavaScript-->
<script src="vendors/bootstrap/js/bootstrap.min.js"></script>
<!-- Vendors-->
<script src="vendors/flexslider/jquery.flexslider-min.js"></script>
<script src="vendors/swipebox/js/jquery.swipebox.min.js"></script>
<script src="vendors/slick/slick.min.js"></script>
<script src="vendors/isotope/isotope.pkgd.min.js"></script>
<script src="vendors/jquery-countTo/jquery.countTo.min.js"></script>
<script src="vendors/jquery-appear/jquery.appear.min.js"></script>
<script src="vendors/parallax/parallax.min.js"></script>
<script src="vendors/gmaps/gmaps.min.js"></script>
<script src="vendors/audiojs/audio.min.js"></script>
<script src="vendors/vide/jquery.vide.min.js"></script>
<script src="vendors/pageloading/js/svgLoader.min.js"></script>
<script src="vendors/pageloading/js/classie.min.js"></script>
<script src="vendors/pageloading/sidebartransition/js/sidebarEffects.min.js"></script>
<script src="vendors/nicescroll/jquery.nicescroll.min.js"></script>
<script src="vendors/wowjs/wow.min.js"></script>
<script src="vendors/skrollr.min.js"></script>
<script src="vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="vendors/jquery-cookie/js.cookie.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>
<!-- Own script-->
<script src="js/layout.js"></script>
<script src="js/elements.js"></script>
<script src="js/widget.js"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-102426561-1', 'auto');
    ga('send', 'pageview');

</script>

{{--<script>--}}

    {{--function ajaxCart(idSP,qty = 1){--}}
        {{--$.ajax({--}}
            {{--url:"Cart.php",--}}
            {{--method:"POST",--}}
            {{--data:{--}}
                {{--id : idSP,--}}
                {{--soluong : qty--}}
            {{--}--}}
        {{--}).done(function(data){--}}
            {{--$("#tensp").html("<b>"+data+"</b>");--}}
            {{--$("#myModal").modal("show");--}}
        {{--});--}}
    {{--}--}}

    {{--$(document).ready(function(){--}}
        {{--$(".btn-add-to-card").click(function(){--}}
            {{--var id1= $(this).attr('data-id');--}}
            {{--ajaxCart(id1);--}}
        {{--});--}}

        {{--$(".add-to-cart").click(function(){--}}
            {{--var id_sp = $(this).attr('data-id');--}}
            {{--var qty = $("#txtQuantity").val().toString();--}}
            {{--ajaxCart(id_sp,qty);--}}
        {{--});--}}

        {{--$("#txtQuantity").on("input",function(){--}}
            {{--if(parseInt($(this).val()) > 20){--}}
                {{--$(".add-to-cart").hide(500);--}}
            {{--}--}}
            {{--else{--}}
                {{--$(".add-to-cart").show(500);--}}
            {{--}--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
</body>



<!-- Mirrored from swin-themes.com/html/fooday/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Sep 2017 09:12:42 GMT -->
</html>