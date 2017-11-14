
@if(isset($food_result) && count($food_result)!=0)
    @foreach($food_result as $food)
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="blog-item item swin-transition">
                <div class="block-img"><img src="images/hinh_mon_an/{{$food->image}}" alt="" class="img img-responsive">
                    <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount">{{$food->price}}<span class="price-symbol">vnd</span></span></div>
                    <div class="group-btn"><a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                </div>
                <div class="block-content">
                    <h5 class="title"><a href="javascript:void(0)">{{$food->name}}</a></h5>
                    <div class="product-info">{{$food->summary}}</div>
                </div>
            </div>
        </div>
    @endforeach
@endif