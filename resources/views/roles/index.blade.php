@extends('layouts.app')
@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">

        </h3>
        <div class="card-toolbar">
            <a class="btn btn-success font-weight-bolder font-size-sm dd-new-item" href="{{ route('roles.create') }}">Thêm Phân quyền</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body border-0 py-5">
        <table class="table table-bordered">
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th width="280px">Hành động</th>
            </tr>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Chỉnh sửa</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>
        {!! $roles->render() !!}
    </div>
</div>
@endsection