
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="swin-sc swin-sc-title style-3">
                    <p class="title"><span>{{$def_detailmenu[0]->name}}</span></p>
                </div>
                <div class="swin-sc swin-sc-product products-01 style-02 woocommerce">

                    <div class="row">
                        <div class="nav-slider">
                            <div class="tab-content">
                                <div class="col-md-5 col-sm-12">
                                    <div class="cat-wrapper">
                                        <div class="item"><img src="images/thuc_don/{{$def_detailmenu[0]->image}}" alt="" class="img img-responsive img-full"></div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <div class="products">
                                        @foreach($def_detailmenu_food as $food)
                                        <div class="item product-01">
                                            <div class="item-left">
                                                <h5 class="title">{{$food->name}}</h5>
                                                <div class="des">{!! $food->detail !!}</div>
                                            </div>
                                            <div class="item-right"><span class="price woocommerce-Price-amount amount">{{$food->price}}<span class="price-symbol">vnd</span></span></div>
                                        </div>
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>