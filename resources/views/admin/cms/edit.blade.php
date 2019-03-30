@extends('admin.layouts.main')
@section('title', 'Cms Edit')

@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">Cms Edit</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<!-- Default panel -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">Cms Edit</h5>
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

        <form action="{{ route('admin.cms.update', ['id' => $cms->id]) }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <label>Title :</label>
                <input type="text" name="title" value="{{ $cms->title ?: old('title') }}" class="form-control required" required>
            </div><br>
            <div class="row">
                <label>Description :</label>
                <textarea name="description" id="editor" rows="4" cols="4" class="form-control required" data-placeholder="Enter Product Details" required>{{ $cms->description ?: old('description') }}</textarea>
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
    $(function () {
        $('#editor').summernote();
    });
</script>
@endsection
