@extends('admin.layouts.main')
@section('title', 'Product Create')

@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">Product Create</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<!-- Default panel -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">Product Add</h5>
    </div>
    <div class="panel-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.product.create') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Main Category: <span class="text-danger">*</span></label>
                        <select data-placeholder="Select Main Category" class="form-control category" required name="categoryId">
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
                <div class="form-group col-md-6">
                    <label>Product Name: <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Enter Product Name" class="form-control required" required value="{{ old('name') }}" autocomplete="off">
                    @foreach($errors->get('name') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label>Price: <span class="text-danger">*</span></label>
                    <input type="number" name="price" placeholder="Enter Price" class="form-control required" value="{{ old('price') }}" pattern="[0-9]" min="0" required autocomplete="off">
                    @foreach($errors->get('price') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-3">
                    <label>Shipping Charge: <span class="text-danger">*</span></label>
                    <input type="text" name="shipping_charge" placeholder="Enter Shipping Charge" class="form-control required" required value="{{ old('shipping_charge') }}" autocomplete="off">
                    @foreach($errors->get('shipping_charge') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-3">
                    <label>Quantity: <span class="text-danger">*</span></label>
                    <input type="text" name="qty" placeholder="Enter Quantity" class="form-control required" required value="{{ old('qty') }}" autocomplete="off">
                    @foreach($errors->get('qty') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-3">
                    <label>Height X With X Length: <span class="text-danger">*</span></label>
                    <input type="text" name="height_with_length" placeholder="Enter Height X With X Length" class="form-control required" required value="{{ old('height_with_length') }}" autocomplete="off">
                    @foreach($errors->get('height_with_length') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Thumb Image :<span class="text-danger">*</span></label>
                        <input type="file" name="thumbImage" class="form-control required" required accept=".jpeg, .jpg, .png">
                        <span class="help-block">Accepted formats: jpeg, jpg, png. Max file size 2Mb</span>
                        @foreach($errors->get('thumbImage') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label>Piece : <span class="text-danger">*</span></label>
                    <input type="text" name="piece" value="{{ old('piece') }}" placeholder="Enter piece" class="form-control" required autocomplete="off">
                    @foreach($errors->get('piece') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-4">
                    <label>Pack (BUNDLE): <span class="text-danger">*</span></label>
                    <input type="text" name="pack" value="{{ old('pack') }}" placeholder="Enter Pack" class="form-control" required autocomplete="off">
                    @foreach($errors->get('pack') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Weight (In Gram): <span class="text-danger">*</span></label>
                    <input type="text" name="weight" placeholder="Enter Weight" class="form-control required" required value="{{ old('weight') }}" autocomplete="off">
                    @foreach($errors->get('weight') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-4">
                    <label>Meta Keyword: <span class="text-danger">*</span></label>
                    <input type="text" name="meta_keyword" value="{{ old('meta_keyword') ?: 'Packaging'}}" class="form-control metaKeyword" data-fouc required="">
                    @foreach($errors->get('meta_keyword') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Meta Description :<span class="text-danger">*</span></label>
                        <textarea name="meta_description" class="form-control required" required placeholder="Enter Meta Description">{{ old('meta_description') }}</textarea>
                        @foreach($errors->get('meta_description') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <h1>PRICE PER BOX</h1>
                <div class="form-group col-md-3">
                    <label>100: <span class="text-danger">*</span></label>
                    <input type="number" name="first_box_price" placeholder="Enter Price" class="form-control" required pattern="[0-9]" min="0" required autocomplete="off" value="{{ old('first_box_price') }}">
                </div>
                <div class="form-group col-md-3">
                    <label>250: <span class="text-danger">*</span></label>
                    <input type="number" name="second_box_price" placeholder="Enter Price" class="form-control" required pattern="[0-9]" min="0" required value="{{ old('second_box_price') }}" autocomplete="off">
                </div>
                <div class="form-group col-md-3">
                    <label>500: <span class="text-danger">*</span></label>
                    <input type="number" name="third_box_price" placeholder="Enter Price" class="form-control" required pattern="[0-9]" min="0" required value="{{ old('third_box_price') }}" autocomplete="off">
                </div>
                <div class="form-group col-md-3">
                    <label>1000+: <span class="text-danger">*</span></label>
                    <input type="number" name="four_box_price" placeholder="Enter Price" class="form-control" required pattern="[0-9]" min="0" required value="{{ old('four_box_price') }}" autocomplete="off">
                </div>
            </div>
            <div class="row">
                <label>Description :</label>
                <textarea name="description" id="editor" rows="4" cols="4" class="form-control required" data-placeholder="Enter Product Details" required>{{ old('description') }}</textarea>
                @foreach($errors->get('description') as $error)
                <span style="color: red;">{{$error}}</span>
                @endforeach
            </div> 
            <p><br></p>
            <div class="row pull-right">
                <button type="submit" class="btn btn-primary stepy-finish">
                    Submit <i class="icon-check position-right"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="/assets/js/plugins/forms/tags/tagsinput.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/tags/tokenfield.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/editors/summernote/summernote.min.js"></script>
<script type="text/javascript">
    $('#form').submit(function () {
        $(this).find(':button[type=submit]').prop('disabled', true);
    });

    var form_html = '';
    var html_inc = '0';
    $(document).ready(function () {
        $('.metaKeyword').tokenfield();
        form_html = $('#product0').html();
    });
    $(function () {
        $('#editor').summernote();
    });

    $('#submit').on('click', function () {
        colors.forEach(function (color) {
            $('#cloudinaryInput' + color.id).val(color.images.join(','));
        });
    });
    var count = 1;
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

    $('#finish').css('display', 'none');
</script>
@endsection
