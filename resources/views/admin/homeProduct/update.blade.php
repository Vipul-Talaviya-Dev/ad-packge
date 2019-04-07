@extends('admin.layouts.main')
@section('title', 'Home Products Update')
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Home Products Update</li>
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
                    <h1 class="panel-title"> Home Products</h1>
                </div>
                <hr/>
                <!-- Single row selection -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-body">
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                                <form class="form-horizontal form-validate-jquery" id="product" action="{{ route('admin.homeProduct.update',['id'=> $homeProduct->id]) }}"
                                  method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  <fieldset class="content-group">
                                    <div class="form-group pCateDiv">
                                        <div class="">
                                            <label> Category: <button type="button" class="btn btn-sm btn-info changeCategory">Change</button></label>
                                            <select data-placeholder="Select Category" class="form-control">
                                                <option selected="" disabled="">{{ $homeProduct->category->name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <span class="categoryDiv" style="display: none;">
                                        <div class="form-group">
                                            <div class="">
                                                <label>Main Category: <span class="text-danger">*</span></label>
                                                <select data-placeholder="Select Main Category" class="form-control category" name="categoryId">
                                                    <option value="">-- Select Main Category --</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('categoryId') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach        
                                                </select>
                                                @if($errors->get('categoryId'))
                                                @foreach($errors->get('categoryId') as $error)
                                                <span style="color: red;">{{$error}}</span>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="subCategoryDiv"></div>
                                    </span>

                                    <div class="form-group">
                                        <div class="col-lg-1"></div>
                                        <label class="col-lg-2 control-label text-semibold">Name :</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="name" value="{{ $homeProduct->name }}" class="form-control" placeholder="Enter Name" autocomplete="off" required="">
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
                                            <input type="file" name="image" class="file-styled"  accept=".jpeg, .jpg, .png, .gif">
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
                                                <input type="radio" checked name="status" @if($homeProduct->status==2) {{'checked'}} @endif  value="1">
                                                Active
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="status"  @if($homeProduct->status==2) {{'checked'}} @endif  value="2">
                                                In-Active
                                            </label>
                                        </div>
                                        @if($errors->get('status'))
                                        @foreach($errors->get('status') as $error)
                                        <span style="color: red;"><i
                                            class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
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
    <script>
        $('#product').submit(function(){
            $(this).find(':button[type=submit]').prop('disabled', true);
        });
        $(document).ready(function() {
            $('body').on('change', '.category', function () {
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('api.subCategory') }}',
                        data: {'id': id, '_token': "{{ csrf_token() }}"},
                        success: function (data) {
                            $("#subCategory").empty();
                            if (data.status) {
                                if(data.categories.length > 0) {
                                    $(".subCategoryDiv").show();
                                    var categories = '<option value="">-- Select SubCategory --</option>';
                                    $.each(data.categories, function (key, value) {
                                        categories +='<option value="' + value['id'] + '">' + value['name'] + '</option>';
                                    });
                                    $(".subCategoryDiv").html('<div class="col-md-3"><div class="form-group"><label>Sub Category: <span class="text-danger">*</span></label><select name="categoryId"  data-placeholder="Select Type First" class="form-control category subCategory">'+categories+'</select></div>'); 
                                    count++;  
                                }
                            } else {
                                $(".subCategory").empty();
                                $(".subCategoryDiv").hide();
                            }
                        }
                    });
                }
            });

            $("body").on("click", ".changeCategory", function() {
                $(".pCateDiv").hide();
                $(".categoryDiv").show();
            })
        })
    </script>
    @endsection
