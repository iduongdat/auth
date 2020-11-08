@extends('layouts.app')
@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">

        </h3>
        <div class="card-toolbar">
            <a class="btn btn-success font-weight-bolder font-size-sm dd-new-item">Thêm Trang</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body border-0 py-5">
                    @include('pages.menulink', ['items' => $MyPage->roots()])
    </div>
    <!--end::Body-->
</div>
@endsection