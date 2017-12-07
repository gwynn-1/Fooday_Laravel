<div class="products nav-slider">
    <div class="row slick-padding">
        @foreach($foodpaging as $f)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="blog-item item swin-transition">
                    <div class="block-img"><img src="images/hinh_mon_an/{{$f->image}}" alt="" style="width: 200px;height: 200px" class="img img-responsive">
                        <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount">{{$f->price}} <span class="price-symbol">vnd</span></span></div>
                        <div class="group-btn"><a href="detail/{{$f->id}}/{{$f->url}}" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card" data-id="{{$f->id}}"><i class="fa fa-shopping-basket"></i></a></div>
                    </div>
                    <div class="block-content">
                        <h5 class="title"><a href="detail/{{$f->id}}/{{$f->url}}">{{$f->name}}</a></h5>
                        <div class="product-info">{{$f->summary}}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@include("Pagination.limit-link",["paginator"=>$foodpaging])
{{--{{$foodpaging->links('Pagination.limit-link')}}--}}