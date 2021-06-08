@switch($item['item_layout'])
    @case('item_pagina')
        @include('components/menu/item-page', ['item' => $item, 'item_class' => $item_class])
    @break

    @case('item_post')
        @include('components/menu/item-post', ['item' => $item, 'item_class' => $item_class])
    @break

    @case('item_taxonomy')
        {{-- TODO TAXONOMY CASE --}}
        Taxonomia...
    @break

    @case('item_link')        
        @include('components/menu/item-link', ['item' => $item, 'item_class' => $item_class, 'layout' => $item['li_custom_layout'] ])
    @break
@endswitch