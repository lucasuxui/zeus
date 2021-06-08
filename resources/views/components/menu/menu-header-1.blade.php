@php $settings = get_option('options_gerais');@endphp

@php if($settings['switch_menu_header_1']): @endphp

    @php if(isset($settings['title_menu_header_1'])): @endphp
    <p class="text-sub-menu">{{$settings['title_menu_header_1']}}</p>
    @php endif; @endphp
    @php foreach($settings['menu_header_1'] as $item):@endphp        
        @include('components/menu/menu-item' ,['item' => $item, 'item_class' => 'nav-link'])
    @php endforeach;@endphp 
    
@php endif; @endphp