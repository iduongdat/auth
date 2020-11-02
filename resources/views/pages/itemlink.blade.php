@foreach($items as $item)
<li class="dd-item" data-id="{{$item->id}}">
    <div class="dd-handle">
        {!! \App\Models\Page::where(['title_en' => $item->title])->pluck('title')->first(); !!}
    </div>
</li>
@endforeach