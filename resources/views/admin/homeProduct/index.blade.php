@extends('admin.layouts.main')
@section('title', 'Home Product')
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Home Product</li>
            </ul>
        </div>
    </div>
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
                        <h1 class="panel-title">Home Product</h1>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                        <a href="{{ route('admin.homeProduct.add') }}">
                            <button class="btn btn-block-group pull-right" style="margin-right: 40px; margin-top: 20px;"><i class="icon-plus22 position-left"></i>ADD New </button>
                        </a>
                        <div class="content">
                            <div class="panel panel-flat">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Catgory Name</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($homeProducts))
                                        @foreach($homeProducts as $key => $homeProduct)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $homeProduct->category->name }}</td>
                                                <td>{{ $homeProduct->name }}</td>
                                                @if(!empty($homeProduct->image))
                                                    <td><img src="{{ \Cloudder::secureShow($homeProduct->image) }}" alt="" style="max-height: 100px; max-width: 200px"></td>
                                                @else
                                                    <td><span class="label label-default">No</span></td>
                                                @endif
                                                @if($homeProduct->status == 1)
                                                    <td><span class="label label-success">Active</span></td>
                                                @else
                                                    <td><span class="label label-danger">In-Active</span></td>
                                                @endif

                                                <td class="text-center"><a href="{{ route('admin.homeProduct.edit',$homeProduct->id) }}"><i class="icon-pencil5"></i> Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {!! $homeProducts->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /content area -->

        @endsection
        @section('js')
            <script type="text/javascript" src="/assets/js/plugins/tables/datatables/datatables.min.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
            <script type="text/javascript" src="/assets/js/core/app.js"></script>
            <script type="text/javascript" src="/assets/js/pages/datatables_api.js"></script>
            <script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
            <script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>
@endsection
