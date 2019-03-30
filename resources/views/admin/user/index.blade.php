@extends('admin.layouts.main')
@section('title', 'Users')
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Users</li>
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
                    <h1 class="panel-title">User List</h1>
                </div>
                <hr/>
                <div class="container-fluid">
                    <div class="content">
                        <div class="panel panel-flat">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Create Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->fullName() }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        @if($user->status == 1)
                                            <td><span class="label label-success">Active</span></td>
                                        @else
                                            <td><span class="label label-default">In-Active</span></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-right">
                            {!! $users->appends($_GET)->render() 
                            !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection