  <!--begin::Menu Container-->
  @foreach($items as $item)
  <li class="dd-item" data-id="{{$item->id}}">
    <div class="dd-handle">
      {!! \App\Models\Page::where(['title_en' => $item->title])->pluck('title')->first(); !!}
    </div>
  </li>
  @if($item->hasChildren())
  <ol class="dd-list">
    @include('pages.itemlink',array('items' => $item->children()))
  </ol>
  @endif
  @if($item->divider)
  <li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>
    @endif
    @endforeach