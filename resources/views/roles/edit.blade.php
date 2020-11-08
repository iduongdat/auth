@extends('layouts.app')
@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Body-->
    <div class="card-body border-0 py-5">
        <h3 class="card-title">Phân quyền: {{$roles->name}}</h3>
        @include('roles.menulink', ['items' => $MyPage->roots()])
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary mb-5">Chỉnh sửa</button>
    </div>
    <!--end::Body-->
</div>
@endsection