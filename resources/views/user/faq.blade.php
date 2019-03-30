@extends('user.layouts.main')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'FAQ')

@section('content')
<!-- start offer -->
<section class="">
    <div class="container">
        <p><br></p>
        <h3 class="text-center">FAQs (Frequently Asked Questions) - DAM Packs</h3><br>
        <div class="row">
            {!! $faq->description !!}
        </div>
    </div> <!-- end container -->
</section>
<!-- end offer -->  

@endsection