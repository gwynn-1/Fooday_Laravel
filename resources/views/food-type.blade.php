@extends('layout.layout')
@section('content')
    @php
        $arr_icon = ["swin-icon-pasta","swin-icon-fish","swin-icon-meat","swin-icon-ice-cream"];
    @endphp
    <div class="page-container">
        <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-menu">
            <div class="container">
                <div class="title-wrapper">
                    <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Món ăn theo loại</div>
                    <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                    <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">The various dishes are waiting for your coming to enjoy its</div>
                </div>
            </div>
        </div>
        <div class="page-content-wrapper">
            <section class="product-sesction-02 padding-top-100 padding-bottom-100">
                <div class="container">
                    <div class="swin-sc swin-sc-title style-3">
                        <p class="title"><span>Món ăn theo loại</span></p>
                    </div>
                    <div class="swin-sc swin-sc-product products-02 carousel-02">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div data-slide-toshow="5" class="cat-wrapper-02 main-slider col-md-8">
                                @foreach($foodtype as $item)
                                    @php
                                        $icon = rand(0,3);
                                    @endphp
                                <div class="item ftitem" id-food-type="{{$item->id}}">
                                    <div class="cat-icons"><i class="icons {{$arr_icon[$icon]}}"></i>
                                        <h5 class="cat-title">{{$item->name}}</h5>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="products nav-slider">
                            <div class="row slick-padding fooditem">
                                @include("Ajax.ajax_foodtype")
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(".ftitem").click(function () {
                $.ajax({
                   method: "GET",
                   url:"/food-type",
                   data:{
                       id : $(this).attr("id-food-type")
                   }
                }).done(function(data){
                    $(".fooditem").html(data);
                });
            });
        });
    </script>
    @endsection