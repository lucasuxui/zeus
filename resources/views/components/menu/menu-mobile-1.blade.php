@php $settings = get_option('options_gerais');@endphp

@php if($settings['switch_menu_mobile_1']): @endphp

    @php if(isset($settings['title_menu_mobile_1'])): @endphp
    <p class="text-sub-menu">{{$settings['title_menu_mobile_1']}}</p>
    @php endif; @endphp
    @php foreach($settings['menu_mobile_1'] as $item):@endphp        
        @include('components/menu/menu-item' ,['item' => $item, 'item_class' => 'nav-link'])
    @php endforeach;@endphp 
    
@php endif; @endphp