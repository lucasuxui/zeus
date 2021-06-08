@php $settings = get_option('options_gerais');@endphp

@switch($button)
    @case('button_1')
        @foreach ($settings['cta_rows'] as $button_layout)
            @if ($button_layout['cta_layout'] == $button)
                <a href="{{$button_layout['cta_link']}}" target="_blank" class="button hero w-button">{{$button_layout['cta_title']}}</a>                
            @endif
        @endforeach
        @break

    @case('button_1_1')
        @foreach ($settings['cta_rows'] as $button_layout)
            @if ($button_layout['cta_layout'] == $button)
                <a href="{{$button_layout['cta_link']}}" target="_blank" class="button hero w-button">{{$button_layout['cta_title']}}</a>                
            @endif
        @endforeach
        @break

    @case('button_1_2')
        @foreach ($settings['cta_rows'] as $button_layout)
            @if ($button_layout['cta_layout'] == $button)
                <a href="{{$button_layout['cta_link']}}" target="_blank" class="button hero w-button">{{$button_layout['cta_title']}}</a>                
            @endif
        @endforeach
        @break

    @case('button_1_3')
        @foreach ($settings['cta_rows'] as $button_layout)
            @if ($button_layout['cta_layout'] == $button)
                <a href="{{$button_layout['cta_link']}}" target="_blank" class="button hero w-button">{{$button_layout['cta_title']}}</a>                
            @endif
        @endforeach
        @break

    @case('button_1_4')
        @foreach ($settings['cta_rows'] as $button_layout)
            @if ($button_layout['cta_layout'] == $button)
                <a href="{{$button_layout['cta_link']}}" target="_blank" class="button hero w-button">{{$button_layout['cta_title']}}</a>                
            @endif
        @endforeach
        @break

    @case('button_2')
        @foreach ($settings['cta_rows'] as $button_layout)
            @if ($button_layout['cta_layout'] == $button)
                <a href="{{$button_layout['cta_link']}}" target="_blank" class="button-2 no-padding w-button">{{$button_layout['cta_title']}}</a>
            @endif
        @endforeach
        @break

    @case('button_3')
        @foreach ($settings['cta_rows'] as $button_layout)
            @if ($button_layout['cta_layout'] == $button)
                <div class="div-block-2">
                    <a href="{{$button_layout['cta_link']}}" target="_blank" class="button hero pad-30 w-button">{{$button_layout['cta_title']}}</a>
                    <a href="{{$button_layout['sub_cta_link']}}" target="_blank" class="button-2 w-button">{{$button_layout['sub_cta_title']}}</a>
                </div>
            @endif
        @endforeach
        @break

@endswitch