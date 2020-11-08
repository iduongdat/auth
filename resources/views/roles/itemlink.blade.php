@foreach($items as $item)
<div class="card">
    <div class="card-header" id="heading{{$item->id}}">
        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse{{$item->id}}" aria-expanded="false"> <i class="{!! \App\Models\Page::where(['title_en' => $item->title])->pluck('icon')->first(); !!}"></i> <span class="ml-2">{!! \App\Models\Page::where(['title_en' => $item->title])->pluck('title')->first(); !!}</span></div>
    </div>
    <div id="collapse{{$item->id}}" class="collapse" data-parent="#accordionExample" style="">
        <div class="card-body">
            <div class="checkbox-inline">
                @foreach($permission as $data)
                <label class="checkbox">
                    <input type="checkbox" value="{{$data->id}}" checked="checked" name="Checkboxes5">
                    <span></span>@if($data->name == 'create') Thêm @elseif($data->name == 'edit') Sửa @elseif($data->name == 'delete') Xóa @elseif($data->name == 'publish') Hiển thị @endif</label>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endforeach