@extends('user.layouts.main')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Terms & Condition')

@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <h2>Terms & Condition</h2>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>Terms & Condition</li>
                </ol>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>        
@endsection

@section('content')
        <!-- start offer -->
        <section class="section-padding offer-section">
            <div class="container">
                <div class="row">
                        <div class="offer-text">
                            {!! $terms->description !!}
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end offer -->  

@endsection