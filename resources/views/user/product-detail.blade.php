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
<style type="text/css">
hr {
    border-top: 1px solid #ccc;
}
.shop-details-main-content .product-details .product-option {
     margin-top: 0px; 
}
</style>
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
                        <input type="hidden" name="productId" class="productId" value="{{ $product->id }}">
                    </div>
                    <!-- <div class="slider-nav">
                        <div><img src="{{ \Cloudder::secureShow($product->image, []) }}" class="img img-responsive" alt></div>
                    </div> -->
                </div>
            </div>

            <div class="col col-md-6">
                <div class="product-details">
                    <h2>{{ $product->name }}</h2>
                    @if(false)
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    @endif
                    <div class="price">
                        <span class="current"><i class="fa fa-rupee"></i> {{ $product->price }}</span>
                    </div>
                    <div>
                        {!! $product->description !!}
                    </div>
                    <hr>
                    <div class="product-option">
                        <div class="form-group" style="width: 145px;">
                            <select name="qtySelect" class="form-control selectQty" id="selectQty{{ $product->id }}" data-id="{{ $product->id }}"> 
                                <option value="" >-- Select one --</option>
                                <option value="100">100</option>
                                <option value="250">250</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                                <option value="all">1000+</option>
                            </select> 
                            <input type="text" id="inputQty{{ $product->id }}" name="qty" class="form-control inputQty" maxlength="8" value="" style="display: none;" placeholder="Enter quantity">
                        </div>
                        <p><a class="item_add btn theme-btn" href="javascript:void(0);" data-byNow="0" style="width: 145px;">Buy Now</a></p>
                    </div> <!-- end option -->
                </div> <!-- end product details -->
            </div> <!-- end col -->
        </div> <!-- end row -->
        @if(false)
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
        @endif
    </div> <!-- end of container -->
</section>
<!-- end of sop-details-main-content -->  
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $("body").on("change", ".selectQty", function() {
            var id = $(this).attr('data-id');
            if($(this).val() == 'all') {
                $("#inputQty"+id).show();
                $(this).hide();
            } else {
                $(this).show();
                $("#inputQty"+id).hide()
            }
        });
    });
</script>
@endsection