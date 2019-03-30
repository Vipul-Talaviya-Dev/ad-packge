@extends('user.layouts.main')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Terms & Condition')

@section('content')
    <!-- start offer -->
    <section class="">
        <div class="container">
            <p><br></p>
            <h3 class="text-center">Terms & Conditions - DAM Packs - DAM Packs</h3><br>
            <div class="row">
                    <div class="offer-text">
                        {!! $terms->description !!}
                    </div>
                </div>
                <p><br></p>
            </div> <!-- end row -->
    </section>
    <!-- end offer -->  

@endsection