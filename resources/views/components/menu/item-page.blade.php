@php    
    $page_id = $item['li_pagina'];
    $page = get_post($page_id);
    $page_link = get_permalink($page_id);
@endphp    

<a href="{{$page_link}}" class="{{$item_class}}" title="{{$page->post_title}}" >{{$page->post_title}}</a>