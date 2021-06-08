@switch($layout)
    @case('header')
        @php $url = wp_get_attachment_image_url($item['image_colorful'], 'full'); @endphp
        <a href="{{$item['link']}}" target="_blank" class="google-play w-inline-block">
            <img src="{{$url}}" loading="lazy" alt="">
        </a>
        @break

    @case('footer')
        @php $url = wp_get_attachment_image_url($item['image_constrast'], 'full'); @endphp
        <a href="{{$item['link']}}" target="_blank" class="app-link-store-2 w-inline-block">
            <img src="{{$url}}" alt="" class="store-logo">
        </a>    
        @break

@endswitch