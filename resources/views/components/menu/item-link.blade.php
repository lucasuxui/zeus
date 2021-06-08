@switch($layout)
    @case('li_custom_layout_link')
        <a href="{{$item['li_custom_link']}}" target="_blank" class="{{$item_class}}">
            @if ($item['li_custom_desc'])        
                <strong>{{$item['li_custom_desc']}}</strong><br>
            @endif
            {{$item['li_custom_title']}}
        </a>
        @break

    @case('li_custom_layout_dropdown')
        <div data-delay="200" data-hover="" class="dropdown w-dropdown">
            <div class="nav-link-2 w-dropdown-toggle">
                <div>{{$item['li_custom_title']}}</div>
                <img src="@asset('images/icon-dropdown-arrow.svg')" alt="" class="dropdown-icon">
            </div>
            <nav class="dropdown-list w-dropdown-list">
            <p class="content-grid-label">{{$item['li_custom_dropdown']}}<br></p>
                @include('components/dropdown', ['item' => $item, 'layout' => $item['li_custom_layout']])
            </nav>
        </div>
        @break
    @case('li_custom_layout_dropdown_images')
        <div data-delay="200" data-hover="" class="dropdown w-dropdown">
            <div class="nav-link-2 w-dropdown-toggle">
                <div>{{$item['li_custom_title']}}</div>
                <img src="@asset('images/icon-dropdown-arrow.svg')" alt="" class="dropdown-icon">
            </div>
            <nav class="dropdown-list w-dropdown-list">
            <p class="content-grid-label">{{$item['li_custom_dropdown']}}<br></p>
                @include('components/dropdown', ['item' => $item, 'layout' => $item['li_custom_layout']])
            </nav>
        </div>
        @break
@endswitch