@extends('admin.layouts.main')
@section('title', 'Prodcuts')
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Products</li>
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
                        <h1 class="panel-title">Product List
                            <a href="{{ route('admin.product.add') }}" class="btn btn-primary pull-right">ADD NEW</a>
                        </h1>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                        <div class="content">
                            <form class="form-horizontal" method="get" action="">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label>Category</label>
                                        <select id="category" class="form-control select-results-color" name="category"
                                                data-placeholder="Select Category">
                                            <option value="">-- Select Category --</option>
                                            @if(isset($categories))
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ request('category') && request('category') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if($errors->get('category'))
                                            @foreach($errors->get('category') as $error)
                                                <span style="color: red;">{{$error}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label>Search: </label>
                                        <input type="text" name="search" class="form-control" style="background: #25A296; color: white" placeholder="Search Text" autocomplete="off">
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{ route('admin.products') }}" class="btn btn-danger form-control" style="margin-top: 27px;">
                                            Reset
                                        </a>
                                    </div>
                                    <div class="pull-right col-md-2">
                                        <input type="submit" {{ request('store') && request('category') && request('subCategory') ? '' : 'disabled' }} id="search" class="btn btn-info form-control" style="margin-top: 27px;">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="content">
                            <div class="panel panel-flat">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>Height With Length</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Shipping Charge</th>
                                        <th>Weight</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($products))
                                        @foreach($products as $key => $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->height_with_length }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->qty }}</td>
                                                <td>{{ $product->shipping_charge }}</td>
                                                <td>{{ $product->weight }}</td>
                                                <td><img src="{{ \Cloudder::secureShow($product->image) }}" alt="" style="max-height: 50px; max-width: 100px">
                                                </td>
                                                @if($product->status == 1)
                                                    <td><span class="label label-success">Active</span></td>
                                                @else
                                                    <td><span class="label label-danger">In-Active</span></td>
                                                @endif
                                                <td class="text-center">
                                                    <a href="{{ route('admin.product.edit', $product->id) }}"><i class="icon-pencil5"></i> Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                @if(isset($products))
                                    {!! $products->appends([
                                        'search' => request('search'),
                                        'category' => request('category'),
                                    ])->render() !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="/assets/js/core/app.js"></script>
    <script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script>
        $('body').on('change', '#category', function () {
            var id = $('#category').val();
            if ('category') {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('api.subCategory') }}',
                    data: {'id': id, '_token': "{{ csrf_token() }}"},
                    success: function (data) {
                        $('#subCategory').empty();
                        if (data) {
                            $("#subCategory").empty();
                            $("#subCategory").append('<option>Select a sub category...</option>');
                            $.each(data, function (key, value) {
                                $("#subCategory").append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                            });

                        } else {
                            $("#subCategory").empty();
                        }
                    }
                });
            }
        });
    </script>
@endsection
