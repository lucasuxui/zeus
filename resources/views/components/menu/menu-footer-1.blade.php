@php $settings = get_option('options_gerais');@endphp

@php if($settings['switch_menu_footer_1']): @endphp
    <div>
        <div class="w-layout-grid menu-grid-vertical">
        @php if(isset($settings['title_menu_footer_1'])): @endphp
        <p class="content-grid-label">{{$settings['title_menu_footer_1']}}</p>
        @php endif; @endphp
        @php foreach($settings['menu_footer_1'] as $item):@endphp        
            @include('components/menu/menu-item' ,['item' => $item, 'item_class' => 'hover-link'])
        @php endforeach;@endphp 
        </div>
    </div>
@php endif; @endphp