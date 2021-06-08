@switch($layout)

    @case('menu_mobile_1')
        @include('components/menu/menu-mobile-1')
    @break

    @case('menu_header_1')
        @include('components/menu/menu-header-1')
    @break

    @case('menu_footer_1')
        @include('components/menu/menu-footer-1')
    @break

@endswitch