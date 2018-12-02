@extends('admin.layouts.main')
@section('title', 'Product Update')

@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">Product Update</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<!-- Default panel -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">Product Update
            <a href="{{ route('admin.products') }}" class="btn btn-primary pull-right">List</a>
        </h5>
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

        <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-3 pCateDiv">
                    <div class="form-group">
                        <label> Category: <button type="button" class="btn btn-sm btn-info changeCategory">Change</button></label>
                        <select data-placeholder="Select Category" class="form-control">
                            <option selected="" disabled="">{{ $product->category->name }}</option>
                        </select>
                    </div>
                </div>
                <span class="categoryDiv" style="display: none;">
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
                </span>
                <div class="form-group col-md-6">
                    <label>Product Name: <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Enter Product Name" class="form-control required" required value="{{ $product->name ?: old('name') }}" autocomplete="off">
                    @foreach($errors->get('name') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label>Price: <span class="text-danger">*</span></label>
                    <input type="number" name="price" placeholder="Enter Price" class="form-control required" value="{{ $product->price ?: old('price') }}" pattern="[0-9]" min="0" required autocomplete="off">
                    @foreach($errors->get('price') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-3">
                    <label>Shipping Charge: <span class="text-danger">*</span></label>
                    <input type="text" name="shipping_charge" placeholder="Enter Shipping Charge" class="form-control required" required value="{{ $product->shipping_charge ?: old('shipping_charge') }}" autocomplete="off">
                    @foreach($errors->get('shipping_charge') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-3">
                    <label>Quantity: <span class="text-danger">*</span></label>
                    <input type="text" name="qty" placeholder="Enter Quantity" class="form-control required" required value="{{ $product->qty ?: old('qty') }}" autocomplete="off">
                    @foreach($errors->get('qty') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-3">
                    <label>Height X With X Length: <span class="text-danger">*</span></label>
                    <input type="text" name="height_with_length" placeholder="Enter Height X With X Length" class="form-control required" required value="{{ $product->height_with_length ?: old('height_with_length') }}" autocomplete="off">
                    @foreach($errors->get('height_with_length') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Thumb Image :<span class="text-danger">*</span></label>
                        <input type="file" name="thumbImage" class="form-control required" accept=".jpeg, .jpg, .png">
                        <span class="help-block">Accepted formats: jpeg, jpg, png. Max file size 2Mb</span>
                        @foreach($errors->get('thumbImage') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label>Piece : <span class="text-danger">*</span></label>
                    <input type="text" name="piece" value="{{ $product->piece ?: old('piece') }}" placeholder="Enter piece" class="form-control" required autocomplete="off">
                    @foreach($errors->get('piece') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-4">
                    <label>Pack (BUNDLE): <span class="text-danger">*</span></label>
                    <input type="text" name="pack" value="{{ $product->pack ?: old('pack') }}" placeholder="Enter Pack" class="form-control" required autocomplete="off">
                    @foreach($errors->get('pack') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Weight (In Gram): <span class="text-danger">*</span></label>
                    <input type="text" name="weight" placeholder="Enter Weight" class="form-control required" required value="{{ $product->weight ?: old('weight') }}" autocomplete="off">
                    @foreach($errors->get('weight') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-4">
                    <label>Meta Keyword: <span class="text-danger">*</span></label>
                    <input type="text" name="meta_keyword" value="{{ $product->meta_keyword ?: old('meta_keyword') ?: 'Packaging'}}" class="form-control metaKeyword" data-fouc required="">
                    @foreach($errors->get('meta_keyword') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Meta Description :<span class="text-danger">*</span></label>
                        <textarea name="meta_description" class="form-control required" required placeholder="Enter Meta Description">{{ $product->meta_description ?: old('meta_description') }}</textarea>
                        @foreach($errors->get('meta_description') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <h1>PRICE PER BOX</h1>
                <?php 
                    $priceBox = json_decode($product->prices_box);
                ?>
                <div class="form-group col-md-3">
                    <label>100: <span class="text-danger">*</span></label>
                    <input type="number" name="first_box_price" placeholder="Enter Price" class="form-control" required pattern="[0-9]" min="0" required autocomplete="off" value="{{ $priceBox->first_100 ?: old('first_box_price') }}">
                </div>
                <div class="form-group col-md-3">
                    <label>250: <span class="text-danger">*</span></label>
                    <input type="number" name="second_box_price" placeholder="Enter Price" class="form-control" required pattern="[0-9]" min="0" required value="{{ $priceBox->second_250 ?: old('second_box_price') }}" autocomplete="off">
                </div>
                <div class="form-group col-md-3">
                    <label>500: <span class="text-danger">*</span></label>
                    <input type="number" name="third_box_price" placeholder="Enter Price" class="form-control" required pattern="[0-9]" min="0" required value="{{ $priceBox->third_500 ?: old('third_box_price') }}" autocomplete="off">
                </div>
                <div class="form-group col-md-3">
                    <label>1000+: <span class="text-danger">*</span></label>
                    <input type="number" name="four_box_price" placeholder="Enter Price" class="form-control" required pattern="[0-9]" min="0" required value="{{ $priceBox->four_1001 ?: old('four_box_price') }}" autocomplete="off">
                </div>
            </div>
            <div class="row">
                <label>Description :</label>
                <textarea name="description" id="editor" rows="4" cols="4" class="form-control required" data-placeholder="Enter Product Details" required>{{ $product->description ?: old('description') }}</textarea>
                @foreach($errors->get('description') as $error)
                <span style="color: red;">{{$error}}</span>
                @endforeach
            </div> 
            <div class="row">
                <label class="col-md-1">Status:</label>
                <div class="col-md-11">
                    <label class="radio-inline">
                        <input type="radio" @if($product->status == 1) checked
                               @endif name="status" class="styled"
                               value="1">
                        Active
                    </label>

                    <label class="radio-inline">
                        <input type="radio" @if($product->status == 2) checked
                               @endif name="status"
                               value="2"
                               class="styled">
                        In-Active
                    </label>
                </div>
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

    $(document).ready(function () {
        $('.metaKeyword').tokenfield();
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

    $("body").on("click", ".changeCategory", function() {
        $(".pCateDiv").hide();
        $(".categoryDiv").show();
    })
    $('#finish').css('display', 'none');
</script>
@endsection
