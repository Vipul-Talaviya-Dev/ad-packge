@extends('admin.layouts.main')
@section('title', 'Home Product Add')
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
                    <h1 class="panel-title">Home Product Add</h1>
                </div>
                <hr/>
                <!-- Single row selection -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-body">
                                <form class="form-horizontal form-validate-jquery" id="product" action="{{ route('admin.homeProduct.create') }}"
                                method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <fieldset class="content-group">
                                    <div class="form-group">
                                        <div class="col-lg-3">
                                            <label class="control-label">Main Category</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <select data-placeholder="Select a type..."
                                            class="select-results-color form-control category" name="categoryId">
                                            <option value="">-- Select Main Category --</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="subCategoryDiv" style="display: none;">
                                    <div class="col-lg-3">
                                            <label class="control-label">Sub Category</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <select data-placeholder="Select a Sub Category..."
                                            class="select-results-color form-control" id="subCategory" name="categoryId">
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <div class="col-lg-1"></div>
                                        <label class="col-lg-2 control-label text-semibold">Title :</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"  placeholder="Enter Title" autocomplete="off" required="">
                                            @if($errors->get('name'))
                                            @foreach($errors->get('name') as $error)
                                            <span style="color: red;"><i class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-1"></div>
                                        <label class="col-lg-2 control-label text-semibold">Image file
                                        upload:</label>
                                        <div class="col-lg-8">
                                            <input type="file" name="image" class="file-styled" accept=".jpeg, .jpg, .png, .gif">
                                            @if($errors->get('image'))
                                            @foreach($errors->get('image') as $error)
                                            <span style="color: red;"><i class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-1"></div>
                                        <label class="col-lg-2 control-label text-semibold">Status:</label>
                                        <div class="col-lg-8">
                                            <label class="radio-inline">
                                                <input type="radio" checked name="status" value="1">
                                                Active
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="status" value="2">
                                                In-Active
                                            </label>
                                        </div>
                                        @if($errors->get('status'))
                                        @foreach($errors->get('status') as $error)
                                        <span style="color: red;"><i class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                                        @endforeach
                                        @endif
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <!-- /marketing campaigns -->
                    </div>
                </div>
            </div>
            <!-- /single row selection -->
        </div>
    </div>
</div>
<!-- /traffic sources -->
<!-- /content area -->
@endsection
@section('js')
<script type="text/javascript" src="/assets/js/plugins/forms/validation/validate.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/inputs/touchspin.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/styling/switch.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/styling/switchery.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/styling/uniform.min.js"></script>

<script type="text/javascript" src="/assets/js/core/app.js"></script>
<script type="text/javascript" src="/assets/js/pages/form_validation.js"></script>
<script type="text/javascript">
    $('body').on('change', '.category', function () {
        var id = $(this).val();
        if (id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('api.subCategory') }}',
                data: {'id': id, '_token': "{{ csrf_token() }}"},
                success: function (data) {
                    $('#subCategory').empty();
                    if (data.status) {
                        if(data.categories.length > 0) {
                            $("#subCategoryDiv").show();
                            $("#subCategory").empty();
                            $("#subCategory").append('<option value="">Select A SubCategory</option>');
                            $.each(data.categories, function (key, value) {
                                $("#subCategory").append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                            });
                        }
                    } else {
                        $("#subCategory").empty();
                        $("#subCategoryDiv").hide();
                    }
                }
            });
        } else {
            $("#subCategoryDiv").hide();
        }
    });
</script>
@endsection
