@extends('user.layouts.main')

@section('css')
<link rel="stylesheet" type="text/css" href="/front/css/custom.css">
<style type="text/css">
    .page-title {
        background: url('/front/images/products.jpg') center center/cover no-repeat local;
    }
</style>
@endsection

@section('title', 'Boxes')

@section('page-title')
<section class="page-title">
    <div class="container">
    </div> <!-- end container -->
</section>        
@endsection

@section('content')
<section class="" align="center">
    <p><br></p>
    <div class="container">
        <div class="row">
            <table cellspacing="0" cellpadding="0" align="center" >
                <tbody>
                    <tr>
                        <td style="padding-bottom:10px;">
                            <table border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="subgroupChart floatSource" headerrowsize="2">
                                <tbody>
                                    <tr>
                                        <td class="webSubhead" colspan="8" style="min-width: 547px; max-width: 547px;">
                                            <h2>CUBE BOXES</h2>
                                        </td>
                                    </tr>
                                    <tr class="subgroupChartHeader">
                                        <td class="chartHeadLargeBaselines" colspan="2" rowspan="2" style="min-width: 250px; max-width: 250px;">Size Of Box</td>
                                        <td class="chartHeadLargeBaselines" rowspan="2" style="min-width: 131px; max-width: 131px;">INSIDE DIM.<br>L x W x H</td>
                                        <td class="chartHeadLargeBaselines" colspan="4" style="min-width: 321px; max-width: 321px;">PRICE PER BOX </td>
                                        <!-- <td class="chartHeadLargeBaselines" colspan="3" rowspan="2" style="min-width: 92px; max-width: 93px;">BUNDLE/<br>BALE QTY.</td>
                                            <td class="chartHeadLargeBaselines" rowspan="2" style="min-width: 62px; max-width: 62px;">LBS./<br>WT.</td> -->
                                            <td class="chartHeadLargeBaselineLast" colspan="2" rowspan="2" style="min-width: 104px; max-width: 106px;">ADD TO<br>CART</td>
                                        </tr>
                                        <tr class="subgroupChartHeader">
                                            <td class="chartHeadLargeBaselineChart">100</td>
                                            <td class="chartHeadLargeBaselineChart">250</td>
                                            <td class="chartHeadLargeBaselineChart">500</td>
                                            <td class="chartHeadLargeBaselineChart">1000+</td>
                                        </tr>
                                        @foreach($products as $product)
                                        <?php
                                        $subPrice = json_decode($product->prices_box, true);
                                        ?>
                                        <tr style="z-index: -1;">
                                            <td class="chartCopyLargeOne">&nbsp;</td>
                                            <td class="chartCopyLargeTwo"><a href="{{ route('user.product.detail', ['productSlug' => $product->slug]) }}">{{ substr($product->name, 0, 30).'...' }}</a></td>
                                            <td class="chartCopyLargeRedThree">&nbsp;&nbsp;&nbsp; {{ $product->height_with_length }}</td>
                                            <td class="priceCellwebPriceSecond"><font color="#FF0000">{{ $subPrice['first_100'] }}</font></td>
                                            <td class="priceCellwebPriceSecond"><font color="#FF0000">{{ $subPrice['second_250'] }}</font></td>
                                            <td class="priceCellwebPriceSecond"><font color="#FF0000">{{ $subPrice['third_500'] }}</font></td>
                                            <td class="priceCellwebPriceThird"><font color="#FF0000">{{ $subPrice['four_1001'] }}</font></td>
                                        <!-- <td class="chartCopyLargeRightRedThree">{{ $product->pack }}</td>
                                        <td class="chartCopyLargeCtrRedFour">/</td>
                                        <td class="chartCopyLargeRedFive">{{ $product->piece }}</td>
                                        <td class="chartCopyLargeCtrRedSix">{{ $product->weight }}</td> -->
                                        <td class="chartCopyLargeCtrSeven">
                                            <select name="qtySelect" class="form-control selectQty" id="selectQty{{ $product->id }}" data-id="{{ $product->id }}"> 
                                                <option value="" >-- Select one --</option>
                                                <option value="100">100</option>
                                                <option value="250">250</option>
                                                <option value="500">500</option>
                                                <option value="1000">1000</option>
                                                <option value="all">1000+</option>
                                            </select> 
                                            <input type="text" id="inputQty{{ $product->id }}" name="qty" class="form-control inputQty" maxlength="8" value="" style="display: none;" placeholder="Enter quantity">
                                        </td>
                                        <td class="chartCopyLargeCtrEight"><a id="cart{{ $product->id }}" class="button2 chartAddButton item_add" href="javascript:void(0);" data-id="{{ $product->id }}" >ADD</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> 
    <p><br></p>
</section>
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