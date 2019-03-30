@extends('admin.layouts.main')
@section('title', 'Contacts')
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Contacts</li>
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
                    <h1 class="panel-title">Contacts</h1>
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contacts as $key => $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td style="white-space: nowrap;">{{ $contact->created_at->toDateString() }}</td>
                                        <td style="white-space: nowrap;">{{ $contact->first_name }}</td>
                                        <td style="white-space: nowrap;">{{ $contact->last_name }}</td>
                                        <td style="white-space: nowrap;">{{ $contact->email }}</td>
                                        <td style="white-space: nowrap;">{{ $contact->mobile }}</td>
                                        <td style="white-space: nowrap;">{{ $contact->message }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="pull-right">
                            {!! $contacts->appends($_GET)->render() 
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