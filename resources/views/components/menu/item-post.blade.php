@php    
    $post_id = $item['li_pagina'];
    $post = get_post($post_id);
    $post_link = get_permalink($post_id);
@endphp

<a href="{{$post_link}}" class="{{$item_class}}" title="{{$post->post_title}}" >{{$post->post_title}}</a>