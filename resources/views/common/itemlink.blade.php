<div class="menu-submenu "><i class="menu-arrow"></i>
    <ul class="menu-subnav">
        @foreach($items as $item)
        <li @if($item->hasChildren()) class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover" @else @lm_attrs($item) @if($item->url== Route::currentRouteName()) class="menu-item menu-item-active" aria-haspopup="true" @endif class="menu-item menu-item" aria-haspopup="true" @lm_endattrs @endif>
            @if($item->link) <a @lm_attrs($item->link) @if($item->hasChildren()) href="javascript:;" class="menu-link menu-toggle" @else href="{{route(\App\Models\Page::where(['title_en' => $item->title])->pluck('link')->first())}}" class="menu-link" @endif @lm_endattrs >
                <i class="menu-bullet menu-bullet-dot"><span></span></i>
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
        @endforeach
    </ul>
</div>