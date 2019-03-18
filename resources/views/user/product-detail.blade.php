@extends('user.layouts.main')

@section('meta')
<meta name="keywords" content="{{ $product->meta_keyword }}">
<meta name="description" content="{{ $product->meta_description }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title')
{{ $product->name }}
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="/front/css/bootstrap-touchspin.css">
@endsection

@section('content')
<!-- start sop-details-main-content -->
<section class="shop-details-main-content section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-6">
                <div class="shop-single-slider-wrapper">
                    <div class="slider-for">
                        <div><img src="{{ \Cloudder::secureShow($product->image, []) }}" class="img img-responsive" alt></div>
                    </div>
                    <!-- <div class="slider-nav">
                        <div><img src="{{ \Cloudder::secureShow($product->image, []) }}" class="img img-responsive" alt></div>
                    </div> -->
                </div>
            </div>

            <div class="col col-md-6">
                <div class="product-details">
                    <h2>{{ $product->name }}</h2>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="price">
                        <span class="current">{{ $product->price }}</span>
                        <span class="old">{{ $product->price+50 }}</span>
                    </div>
                    <!-- <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p> -->

                    <div class="product-option">
                        @if($product->qty == 0)
                            <p><a href="javascript:void(0);" class="btn theme-btn">Out Of Stock</a></p>
                        @else
                            <!-- <p><a class="item_add btn theme-btn" href="javascript:void(0);" data-byNow="1">Buy Now</a></p> -->
                            <p><a class="item_add btn theme-btn" href="javascript:void(0);" data-byNow="0">Add to cart</a>
                            </p>
                        @endif  
                    </div> <!-- end option -->
                </div> <!-- end product details -->
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col col-xs-12">
                <div class="product-info">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <input type="hidden" name="productId" class="productId" value="{{ $product->id }}">
                        <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                        <!-- <li><a href="#review" data-toggle="tab">Review <span>3</span></a></li>
                        <li><a href="#tags" data-toggle="tab">Add tags</a></li> -->
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="description">
                            {!! $product->description !!}
                        </div>

                        <!-- <div role="tabpanel" class="tab-pane fade" id="tags">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam minima non fuga hic harum, quis assumenda. Praesentium, impedit. Ipsam enim sed eos vero pariatur quibusdam distinctio, obcaecati unde fuga consequuntur!</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam minima non fuga hic harum, quis assumenda. Praesentium, impedit. Ipsam enim sed eos vero pariatur quibusdam distinctio, obcaecati unde fuga consequuntur!</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end of container -->
</section>
<!-- end of sop-details-main-content -->  
@endsection