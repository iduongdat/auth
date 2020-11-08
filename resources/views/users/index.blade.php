@extends('layouts.app')
@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">

        </h3>
        <div class="card-toolbar">
            <a class="btn btn-success font-weight-bolder font-size-sm dd-new-item" href="{{ route('users.create') }}">Thêm thành viên</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body border-0 py-5">
        <table class="table table-bordered">
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Phân quyền</th>
                <th width="280px">Hành động</th>
            </tr>
            @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Chỉnh sửa</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>
        {!! $data->render() !!}
    </div>
    <!--end::Body-->
</div>
@endsection