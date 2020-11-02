<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

  <!--begin::Menu Container-->
  <div id="kt_aside_menu" class="aside-menu my-4 scroll ps ps--active-y" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500" style="height: 878px; overflow: hidden;">
    <!--begin::Menu Nav-->
    <ul class="menu-nav">
      @foreach($items as $item)
      {{ $item->url }}
      <li @if($item->hasChildren()) class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover" @else @lm_attrs($item) @if($item->url== Route::currentRouteName()) class="menu-item menu-item-active" aria-haspopup="true" @endif class="menu-item menu-item" aria-haspopup="true" @lm_endattrs @endif>
        @if($item->link) <a @lm_attrs($item->link) @if($item->hasChildren()) href="javascript:;" class="menu-link menu-toggle" @else href="/{!! $item->url() !!}" class="menu-link" @endif @lm_endattrs >
          <span class="svg-icon menu-icon">
          <i class="{!! \App\Models\Page::where(['title_en' => $item->title])->pluck('icon')->first(); !!} text-icon"></i>
          </span>
          <span class="menu-text"> {!! \App\Models\Page::where(['title_en' => $item->title])->pluck('title')->first(); !!} </span>
          @if($item->hasChildren())
          <i class="menu-arrow"></i>
          @endif
        </a>
        @else
        <span class="navbar-text">{!! \App\Models\Page::where(['title_en' => $item->title])->pluck('title')->first(); !!}</span>
        @endif
        @if($item->hasChildren())
        @include('common.itemlink',array('items' => $item->children()))
        @endif
      </li>
      @if($item->divider)
      <li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>
        @endif
        @endforeach
    </ul>
    <!--end::Menu Nav-->
  </div>
  <!--end::Menu Container-->
</div>