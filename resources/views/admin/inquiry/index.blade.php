@extends('admin.layouts.main')
@section('title', 'Inquiries')
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Inquiries</li>
        </ul>
    </div>
</div>
@endsection

@section('css')
<style>
.form-control::-webkit-input-placeholder {
    color: #fff;
}
</style>
@endsection

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Main charts -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Traffic sources -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h1 class="panel-title">Inquiries</h1>
                </div>
                <hr/>
                <div class="container-fluid">
                    <div class="">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Business Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inquiries as $key => $inquiry)
                                    <tr>
                                        <td>{{ $inquiry->id }}</td>
                                        <td style="white-space: nowrap;">{{ $inquiry->created_at->toDateString() }}</td>
                                        <td style="white-space: nowrap;">{{ $inquiry->name }}</td>
                                        <td style="white-space: nowrap;">{{ $inquiry->email }}</td>
                                        <td style="white-space: nowrap;">{{ $inquiry->mobile }}</td>
                                        <td style="white-space: nowrap;">{{ $inquiry->business_type }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="pull-right">
                            {!! $inquiries->appends($_GET)->render() 
                            !!}
                            <p><br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection