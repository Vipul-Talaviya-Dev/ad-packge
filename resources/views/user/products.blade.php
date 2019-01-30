@extends('user.layouts.main')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="/front/css/custom.css">
@endsection

@section('title', 'Boxes')

@section('page-title')
@if(false)
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <h2>About us</h2>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>About us</li>
                </ol>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
@endif        
@endsection

@section('content')
<section class="section-padding offer-section">
    <div class="container">
        <div class="row">
            <table cellspacing="0" cellpadding="0">
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
                                        <td class="chartHeadLargeBaseline" colspan="2" rowspan="2" style="min-width: 84px; max-width: 84px;">MODEL<br>NO.</td>
                                        <td class="chartHeadLargeBaselines" rowspan="2" style="min-width: 131px; max-width: 131px;">INSIDE DIM.<br>L x W x H</td>
                                        <td class="chartHeadLargeBaselines" colspan="4" style="min-width: 321px; max-width: 321px;">PRICE PER BOX </td>
                                        <td class="chartHeadLargeBaselines" colspan="3" rowspan="2" style="min-width: 92px; max-width: 93px;">BUNDLE/<br>BALE QTY.</td>
                                        <td class="chartHeadLargeBaselines" rowspan="2" style="min-width: 62px; max-width: 62px;">LBS./<br>WT.</td>
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
                                        <td class="chartCopyLargeTwo"><a href="{{ route('user.product.detail', ['productSlug' => $product->slug]) }}">{{ substr($product->name, 0, 15).'...' }}</a></td>
                                        <td class="chartCopyLargeRedThree">&nbsp;&nbsp;&nbsp; {{ $product->height_with_length }}</td>
                                        <td class="priceCellwebPriceSecond"><font color="#FF0000">{{ $subPrice['first_100'] }}</font></td>
                                        <td class="priceCellwebPriceSecond"><font color="#FF0000">{{ $subPrice['second_250'] }}</font></td>
                                        <td class="priceCellwebPriceSecond"><font color="#FF0000">{{ $subPrice['third_500'] }}</font></td>
                                        <td class="priceCellwebPriceThird"><font color="#FF0000">{{ $subPrice['four_1001'] }}</font></td>
                                        <td class="chartCopyLargeRightRedThree">{{ $product->pack }}</td>
                                        <td class="chartCopyLargeCtrRedFour">/</td>
                                        <td class="chartCopyLargeRedFive">{{ $product->piece }}</td>
                                        <td class="chartCopyLargeCtrRedSix">{{ $product->weight }}</td>
                                        <td class="chartCopyLargeCtrSeven">
                                            <input type="text" id="qty" name="qty" class="chartQtyInput ea-triggers-bound" maxlength="8" value="10">
                                        </td>
                                        <td class="chartCopyLargeCtrEight"><a id="cart{{ $product->id }}" class="button2 chartAddButton" href="javascript:void(0);">ADD</a></td>
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
</section>
@endsection