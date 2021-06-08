<?php

/*
* Metabox Settings
*/

function get_button_styles(){
  $buttons = array(
    'button_1'    => 'Modelo Padrão',
    'button_1_1'  => 'Modelo Cabeçalho',
    'button_1_2'  => 'Modelo Variante 1',
    'button_1_3'  => 'Modelo Variante 2',
    'button_1_4'  => 'Modelo Variante 3',
    'button_2'    => 'Modelo Transparente',
    'button_3'    => 'Modelo Duo'
  );
  return $buttons;
}

// CREATE PAGE

add_filter( 'mb_settings_pages', 'options_page' );

function options_page($settings_pages){



  $settings_pages[] = array(
    'id'          => 'theme-options',
    'option_name' => 'options_gerais',
    'menu_title'  => 'Opções do Tema',
    'icon_url' => 'dashicons-art',
    'position' => 60,
  );

  return $settings_pages;

}

add_filter( 'rwmb_meta_boxes', 'options_meta_boxes' );

function options_meta_boxes( $meta_boxes ) {

  $meta_boxes[] = array(

    'settings_pages' => 'theme-options',
    'id'             => 'Tabs',
    'title'     => 'Opções do Tema',
    'tabs'      => array(
        'info'    => array(
            'label' => 'Informações Gerais',
            'icon'  => 'https://i.imgur.com/jQ3e6ZH.png',
        ),
        'header' => array(
            'label' => 'Cabeçalho',
            'icon'  => 'https://i.imgur.com/fx2nWFN.png',
        ),
        'footer'  => array(
            'label' => 'Rodapé',
            'icon'  => 'https://i.imgur.com/LmQi1Zi.png',
        ),        
        'extras'    => array(
            'label' => 'Extras',
            'icon'  => 'https://i.imgur.com/QWGR49I.png',
        ),
    ),   
    'tab_style' => 'left',
    'fields'    => array(
      // Info
      array(
        'type' => 'heading',
        'name' => 'Logos',
        'desc' => 'Insira sua Logo para o Cabeçalho',
        'tab'  => 'info',
      ),
      array(
        'name'  => 'Logo Principal',
        'id'    => 'logo_main',
        'type'  => 'single_image',
        'placeholder' => 'Logo Principal',
        'tab'  => 'info',
      ),
      array(
        'name'  => 'Logo Retina',
        'id'    => 'logo_retina',
        'type'  => 'single_image',
        'placeholder' => 'Logo Retina',
        'tab'  => 'info',
      ),
      array(
        'name'  => 'Logo Contraste',
        'id'    => 'logo_contrast',
        'type'  => 'single_image',
        'placeholder' => 'Logo Constrate',
        'tab'  => 'info',
      ),
      array(
        'type' => 'heading',
        'name' => 'Botões CTAs',
        'desc' => 'Insira seus CTAs(Call To Action) aqui.',
        'tab'  => 'info',
      ),
      array(
        'name' => '',
        'id'   => 'cta_rows',
        'type' => 'group',
        'tab'  => 'info',
        'clone' => true,
        'fields' => array(      
          array(
            'id'    => 'cta_layout',
            'name'  => 'Layout do Botão',
            'type'  => 'select',
            'options' => get_button_styles(),             
            'std' => 'layout_padrao',
            'callback' => 'metabox_button_options',
          ),
          array(
            'name'  => 'Titulo',
            'id'    => 'cta_title',
            'type'  => 'text', 
            'placeholder' => 'Saiba Mais',
          ),
          array(
              'name'  => 'Link',
              'id'    => 'cta_link',
              'type'  => 'text',
              'placeholder' => 'https://visualpage.com',
          ),
          array(
            'type' => 'divider',
            'hidden' => array( 'cta_layout', '!=', 'button_3' ),
          ),
          array(
            'name'  => 'Titulo',
            'id'    => 'sub_cta_title',
            'type'  => 'text', 
            'placeholder' => 'Saiba Mais',
            'hidden' => array( 'cta_layout', '!=', 'button_3' ),
          ),
          array(
              'name'  => 'Link',
              'id'    => 'sub_cta_link',
              'type'  => 'text',
              'placeholder' => 'https://visualpage.com',
              'hidden' => array( 'cta_layout', '!=', 'button_3' ),
          ),
        )
      ),
      array(
        'type' => 'heading',
        'name' => '',
        'desc' => 'Lojas de App',
        'tab'  => 'info',
      ),
      array(
        'name' => '',
        'id'   => 'cta2_rows',
        'type' => 'group',
        'tab'  => 'info',
        'clone' => true,
        'fields' => array(
          array(
            'name'  => 'Titulo',
            'id'    => 'title',
            'type'  => 'text', 
            'placeholder' => 'Google Play',
          ),
          array(
            'name'  => 'Link',
            'id'    => 'link',
            'type'  => 'url',
            'placeholder' => 'https://visualpage.com',
          ),
          array(
              'name'  => 'Imagem Colorida',
              'id'    => 'image_colorful',
              'type'  => 'single_image',
              'placeholder' => 'Imagem',
          ),
          array(
              'name'  => 'Imagem Constraste',
              'id'    => 'image_constrast',
              'type'  => 'single_image',
              'placeholder' => 'Imagem',
          ),
        )
      ),
      array(
        'type' => 'heading',
        'name' => 'Contato',
        'desc' => 'Informações para Contato',
        'tab'  => 'info',
      ),
      array(
        'name' => 'Email(s)',
        'id'   => 'email',
        'type' => 'text',
        'clone' => true,
        'placeholder' => 'email@email.com',
        'pattern'  => '^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$', // Email Mask
        'tab'  => 'info',
      ),
      array(
        'name' => 'Telefone(s)',
        'id'   => 'phone',
        'type' => 'text',
        'clone' => true,
        'placeholder' => '(99) 99999-9999',
        'pattern'  => '^1\d\d(\d\d)?$|^0800 ?\d{3} ?\d{4}$|^(\(0?([1-9a-zA-Z][0-9a-zA-Z])?[1-9]\d\) ?|0?([1-9a-zA-Z][0-9a-zA-Z])?[1-9]\d[ .-]?)?(9|9[ .-])?[2-9]\d{3}[ .-]?\d{4}$', // Phone Mask
        'tab'  => 'info',
      ),
      array(
        'type' => 'heading',
        'name' => 'Redes Sociais',
        'desc' => 'Insira suas redes sociais aqui',
        'tab'  => 'info',
      ),
      array(
        'name' => '',
        'id'   => 'social_media_rows',
        'type' => 'group',
        'tab'  => 'info',
        'clone' => true,
        'fields' => array(
          array(
            'name'  => 'Rede Social',
            'id'    => 'title',
            'type'  => 'text', 
            'placeholder' => 'Instagram',
          ),
          array(
              'name'  => 'Link',
              'id'    => 'link',
              'type'  => 'url',
              'placeholder' => 'https://www.instagram.com/',    
          ),
          array(
              'name'  => 'Ícone',
              'id'    => 'icon',
              'type'  => 'single_image',
          ),
        )
      ),
      // @Header
      array(
        'type' => 'heading',
        'name' => 'Menus',
        'desc' => 'Menus do Cabeçalho',
        'tab'  => 'header',
      ),
      array(
        'id'    => 'select_menu_header',
        'name'  => '',
        'type'  => 'radio',        
        'options' => array(
            'select_menu_header_1'    => 'Menu Principal',
            'select_menu_mobile_1'    => 'Menu Mobile',
        ),             
        'tab'  => 'header',
        'std' => 'select_menu_header_1',
      ),
      // @Header - Menu Principal
      array(
        'id'        => 'switch_menu_header_1',
        'name'      => 'Habilitar Menu',
        'type'      => 'switch',
        'style'     => 'rounded',
        'on_label'  => 'Sim',
        'off_label' => 'Não',
        'tab'  => 'header',
        'hidden' => array( 'select_menu_header', '!=', 'select_menu_header_1' ),
      ),
      array(
        'name'       => 'Título do Menu',
        'id'         => 'title_menu_header_1',
        'type'       => 'text',
        'tab'  => 'header',
        'hidden' => array( 'select_menu_header', '!=', 'select_menu_header_1' ),
      ),
      array(
        'name' => '',
        'id'   => 'menu_header_1',
        'type' => 'group',
        'tab'  => 'header',
        'clone' => true,
        'sort_clone' => true,
        'hidden' => array( 'select_menu_header', '!=', 'select_menu_header_1' ),
        'fields' => array(             
          array(
            'id'    => 'item_layout',
            'name'  => 'Item do Menu',
            'type'  => 'radio',
            'std' => 'item_pagina',
            'options' => array(
                'item_pagina'    => 'Páginas (Padrão)',
                'item_post'    => 'Posts',
                'item_taxonomy'    => 'Categorias',                
                'item_link'    => 'Link Personalizado',
            ),             
          ),
          array(
            'id'        => 'li_pagina',
            'name'      => 'Páginas',
            'type'      => 'post',
            'post_type' => 'page',
            'hidden' => array( 'item_layout', '!=', 'item_pagina' ),
          ),
          array(
            'id'        => 'li_post',
            'name'      => 'Posts',
            'type'      => 'post',
            'post_type' => 'post',
            'hidden' => array( 'item_layout', '!=', 'item_post' ),
          ),
          array(
            'name'       => 'Categorias',
            'id'         => 'li_taxonomy',
            'type'       => 'taxonomy',
            'taxonomy'   => 'category',
            'field_type'  => 'radio',
            'hidden' => array( 'item_layout', '!=', 'item_taxonomy' ),
          ),
          array(
            'id'    => 'li_custom_layout',
            'name'  => 'Estilo',
            'type'  => 'select',
            'std' => 'li_custom_layout_link',
            'options' => array(
                'li_custom_layout_link'        => 'Link (Padrão)',
                'li_custom_layout_dropdown'    => 'Dropdown',
            ),
            'hidden' => array( 'item_layout', '!=', 'item_link' ),
          ),
          array(
            'name'       => 'Título do Item',
            'id'         => 'li_custom_title',
            'type'       => 'text',
            'hidden' => array( 'item_layout', '!=', 'item_link' ),
          ),
          array(
            'name'       => 'Link (href)',
            'id'         => 'li_custom_link',
            'type'       => 'text',
            'hidden' => array( 'item_layout', '!=', 'item_link' ),
          ),
          array(
            'name' => 'Item do Dropdown',
            'id'   => 'ul_custom_dropdown',
            'type' => 'group',
            'clone' => true,
            'sort_clone' => true,
            'visible' => array(
              array('item_layout', 'item_link'),
              array('li_custom_layout', 'li_custom_layout_dropdown'),
            ),
            'fields' => array(
              array(
                'id'    => 'sub_item_layout',
                'name'  => '',
                'type'  => 'select',
                'std' => 'sub_item_pagina',
                'options' => array(
                    'sub_item_pagina'    => 'Páginas (Padrão)',
                    'sub_item_post'    => 'Posts',
                    'sub_item_taxonomy'    => 'Categorias',                
                    'sub_item_link'    => 'Link Personalizado',
                ),
              ),
              array(
                'id'        => 'sub_li_pagina',
                'name'      => 'Páginas',
                'type'      => 'post',
                'post_type' => 'page',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_pagina' ),
              ),
              array(
                'id'        => 'sub_li_post',
                'name'      => 'Posts',
                'type'      => 'post',
                'post_type' => 'post',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_post' ),
              ),
              array(
                'name'       => 'Categorias',
                'id'         => 'sub_li_taxonomy',
                'type'       => 'taxonomy',
                'taxonomy'   => 'category',
                'field_type'  => 'radio',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_taxonomy' ),
              ),
              array(
                'name'       => 'Título do Item',
                'id'         => 'sub_li_custom_title',
                'type'       => 'text',
              ),
              array(
                'name'       => 'Link (href)',
                'id'         => 'sub_li_custom_link',
                'type'       => 'text',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_link' ),
              ),
            ),
          ),
        )
      ),
      // @Header - Menu Mobile
      array(
        'id'        => 'switch_menu_mobile_1',
        'name'      => 'Habilitar Menu',
        'type'      => 'switch',
        'style'     => 'rounded',
        'on_label'  => 'Sim',
        'off_label' => 'Não',
        'tab'  => 'header',
        'hidden' => array( 'select_menu_header', '!=', 'select_menu_mobile_1' ),
      ),
      array(
        'name'       => 'Título do Menu',
        'id'         => 'title_menu_mobile_1',
        'type'       => 'text',
        'tab'  => 'header',
        'hidden' => array( 'select_menu_header', '!=', 'select_menu_mobile_1' ),
      ),
      array(
        'name' => '',
        'id'   => 'menu_mobile_1',
        'type' => 'group',
        'tab'  => 'header',
        'clone' => true,
        'sort_clone' => true,
        'hidden' => array( 'select_menu_header', '!=', 'select_menu_mobile_1' ),
        'fields' => array(             
          array(
            'id'    => 'item_layout',
            'name'  => 'Item do Menu',
            'type'  => 'radio',
            'std' => 'item_pagina',
            'options' => array(
                'item_pagina'    => 'Páginas (Padrão)',
                'item_post'    => 'Posts',
                'item_taxonomy'    => 'Categorias',                
                'item_link'    => 'Link Personalizado',
            ),             
          ),
          array(
            'id'        => 'li_pagina',
            'name'      => 'Páginas',
            'type'      => 'post',
            'post_type' => 'page',
            'hidden' => array( 'item_layout', '!=', 'item_pagina' ),
          ),
          array(
            'id'        => 'li_post',
            'name'      => 'Posts',
            'type'      => 'post',
            'post_type' => 'post',
            'hidden' => array( 'item_layout', '!=', 'item_post' ),
          ),
          array(
            'name'       => 'Categorias',
            'id'         => 'li_taxonomy',
            'type'       => 'taxonomy',
            'taxonomy'   => 'category',
            'field_type'  => 'radio',
            'hidden' => array( 'item_layout', '!=', 'item_taxonomy' ),
          ),
          array(            
            'id'    => 'li_custom_layout',
            'name'  => 'Estilo',
            'type'  => 'select',
            'std' => 'li_custom_layout_link',
            'options' => array(
                'li_custom_layout_link'             => 'Link (Padrão)',
                'li_custom_layout_dropdown'         => 'Dropdown (Texto)',
                'li_custom_layout_dropdown_images'  => 'Dropdown (Lojas de App)',
            ),
            'hidden' => array( 'item_layout', '!=', 'item_link' ),
          ),
          array(
            'name'       => 'Título do Item',
            'id'         => 'li_custom_title',
            'type'       => 'text',
            'hidden' => array( 'item_layout', '!=', 'item_link' ),
          ),
          array(
            'name'       => 'Link (href)',
            'id'         => 'li_custom_link',
            'type'       => 'text',
            'hidden' => array( 'item_layout', '!=', 'item_link' ),
          ),
          array(
            'name'       => 'Título do Dropdown',
            'id'         => 'li_custom_dropdown',
            'type'       => 'text',
            'visible' => array('li_custom_layout', 'in',['li_custom_layout_dropdown', 'li_custom_layout_dropdown_images']),
          ),
          array(
            'name' => 'Item do Dropdown',
            'id'   => 'ul_custom_dropdown',
            'type' => 'group',
            'clone' => true,
            'sort_clone' => true,
            'visible' => array(
              array('item_layout', 'item_link'),
              array('li_custom_layout', 'in','li_custom_layout_dropdown'),
            ),
            'fields' => array(
              array(
                'id'    => 'sub_item_layout',
                'name'  => '',
                'type'  => 'select',
                'std' => 'sub_item_pagina',
                'options' => array(
                    'sub_item_pagina'    => 'Páginas (Padrão)',
                    'sub_item_post'    => 'Posts',
                    'sub_item_taxonomy'    => 'Categorias',                
                    'sub_item_link'    => 'Link Personalizado',
                ),
              ),
              array(
                'id'        => 'sub_li_pagina',
                'name'      => 'Páginas',
                'type'      => 'post',
                'post_type' => 'page',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_pagina' ),
              ),
              array(
                'id'        => 'sub_li_post',
                'name'      => 'Posts',
                'type'      => 'post',
                'post_type' => 'post',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_post' ),
              ),
              array(
                'name'       => 'Categorias',
                'id'         => 'sub_li_taxonomy',
                'type'       => 'taxonomy',
                'taxonomy'   => 'category',
                'field_type'  => 'radio',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_taxonomy' ),
              ),
              array(
                'name'       => 'Título do Item',
                'id'         => 'sub_li_custom_title',
                'type'       => 'text',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_link' ),
              ),
              array(
                'name'       => 'Link (href)',
                'id'         => 'sub_li_custom_link',
                'type'       => 'text',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_link' ),
              ),
              array(
                'name'       => 'Ícone/Imagem',
                'id'         => 'sub_li_custom_image',
                'type'       => 'single_image',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_link' ),
              ),
            ),
          ),
        )
      ),
      // Footer
      array(
        'type' => 'heading',
        'name' => 'Menus',
        'desc' => 'Menus do Rodapé',
        'tab'  => 'footer',
      ),
      array(
        'id'    => 'select_menu_footer',
        'name'  => '',
        'type'  => 'radio',        
        'options' => array(
            'select_menu_footer_1'    => 'Menu Principal',
            'select_menu_footer_2'    => 'Menu 2',
        ),             
        'tab'  => 'footer',
        'std' => 'select_menu_footer_1',
      ),
      // @Footer - Menu 1
      array(
        'id'        => 'switch_menu_footer_1',
        'name'      => 'Habilitar Menu',
        'type'      => 'switch',
        'style'     => 'rounded',
        'on_label'  => 'Sim',
        'off_label' => 'Não',
        'tab'  => 'footer',
        'hidden' => array( 'select_menu_footer', '!=', 'select_menu_footer_1' ),
      ),
      array(
        'name'       => 'Título do Menu',
        'id'         => 'title_menu_footer_1',
        'type'       => 'text',
        'tab'  => 'footer',
        'hidden' => array( 'select_menu_footer', '!=', 'select_menu_footer_1' ),
      ),
      array(
        'name' => '',
        'id'   => 'menu_footer_1',
        'type' => 'group',
        'tab'  => 'footer',
        'clone' => true,
        'sort_clone' => true,
        'hidden' => array( 'select_menu_footer', '!=', 'select_menu_footer_1' ),
        'fields' => array(             
          array(
            'id'    => 'item_layout',
            'name'  => 'Item do Menu',
            'type'  => 'radio',
            'std' => 'item_pagina',
            'options' => array(
                'item_pagina'    => 'Páginas (Padrão)',
                'item_post'    => 'Posts',
                'item_taxonomy'    => 'Categorias',                
                'item_link'    => 'Link Personalizado',
            ),             
          ),
          array(
            'id'        => 'li_pagina',
            'name'      => 'Páginas',
            'type'      => 'post',
            'post_type' => 'page',
            'hidden' => array( 'item_layout', '!=', 'item_pagina' ),
          ),
          array(
            'id'        => 'li_post',
            'name'      => 'Posts',
            'type'      => 'post',
            'post_type' => 'post',
            'hidden' => array( 'item_layout', '!=', 'item_post' ),
          ),
          array(
            'name'       => 'Categorias',
            'id'         => 'li_taxonomy',
            'type'       => 'taxonomy',
            'taxonomy'   => 'category',
            'field_type'  => 'radio',
            'hidden' => array( 'item_layout', '!=', 'item_taxonomy' ),
          ),
          array(
            'id'    => 'li_custom_layout',
            'name'  => 'Estilo',
            'type'  => 'select',
            'std' => 'li_custom_layout_link',
            'options' => array(
                'li_custom_layout_link'        => 'Link (Padrão)',
                'li_custom_layout_dropdown'    => 'Dropdown',
            ),
            'hidden' => array( 'item_layout', '!=', 'item_link' ),
          ),
          array(
            'name'       => 'Título do Item',
            'id'         => 'li_custom_title',
            'type'       => 'text',
            'hidden' => array( 'item_layout', '!=', 'item_link' ),
          ),
          array(
            'name'       => 'Link (href)',
            'id'         => 'li_custom_link',
            'type'       => 'text',
            'hidden' => array( 'item_layout', '!=', 'item_link' ),
          ),
          array(
            'name' => 'Item do Dropdown',
            'id'   => 'ul_custom_dropdown',
            'type' => 'group',
            'clone' => true,
            'sort_clone' => true,
            'visible' => array(
              array('item_layout', 'item_link'),
              array('li_custom_layout', 'li_custom_layout_dropdown'),
            ),
            'fields' => array(
              array(
                'id'    => 'sub_item_layout',
                'name'  => '',
                'type'  => 'select',
                'std' => 'sub_item_pagina',
                'options' => array(
                    'sub_item_pagina'    => 'Páginas (Padrão)',
                    'sub_item_post'    => 'Posts',
                    'sub_item_taxonomy'    => 'Categorias',                
                    'sub_item_link'    => 'Link Personalizado',
                ),
              ),
              array(
                'id'        => 'sub_li_pagina',
                'name'      => 'Páginas',
                'type'      => 'post',
                'post_type' => 'page',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_pagina' ),
              ),
              array(
                'id'        => 'sub_li_post',
                'name'      => 'Posts',
                'type'      => 'post',
                'post_type' => 'post',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_post' ),
              ),
              array(
                'name'       => 'Categorias',
                'id'         => 'sub_li_taxonomy',
                'type'       => 'taxonomy',
                'taxonomy'   => 'category',
                'field_type'  => 'radio',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_taxonomy' ),
              ),
              array(
                'name'       => 'Título do Item',
                'id'         => 'sub_li_custom_title',
                'type'       => 'text',
              ),
              array(
                'name'       => 'Link (href)',
                'id'         => 'sub_li_custom_link',
                'type'       => 'text',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_link' ),
              ),
            ),
          ),
        )
      ),
      // @Footer - Menu 2
      array(
        'id'        => 'switch_menu_footer_2',
        'name'      => 'Habilitar Menu',
        'type'      => 'switch',
        'style'     => 'rounded',
        'on_label'  => 'Sim',
        'off_label' => 'Não',
        'tab'  => 'footer',
        'hidden' => array( 'select_menu_footer', '!=', 'select_menu_footer_2' ),
      ),
      array(
        'name'       => 'Título do Menu',
        'id'         => 'title_menu_footer_2',
        'type'       => 'text',
        'tab'  => 'footer',
        'hidden' => array( 'select_menu_footer', '!=', 'select_menu_footer_2' ),
      ),
      array(
        'name' => '',
        'id'   => 'menu_footer_2',
        'type' => 'group',
        'tab'  => 'footer',
        'clone' => true,
        'sort_clone' => true,
        'hidden' => array( 'select_menu_footer', '!=', 'select_menu_footer_2' ),
        'fields' => array(             
          array(
            'id'    => 'item_layout',
            'name'  => 'Item do Menu',
            'type'  => 'radio',
            'std' => 'item_pagina',
            'options' => array(
                'item_pagina'    => 'Páginas (Padrão)',
                'item_post'    => 'Posts',
                'item_taxonomy'    => 'Categorias',                
                'item_link'    => 'Link Personalizado',
            ),             
          ),
          array(
            'id'        => 'li_pagina',
            'name'      => 'Páginas',
            'type'      => 'post',
            'post_type' => 'page',
            'hidden' => array( 'item_layout', '!=', 'item_pagina' ),
          ),
          array(
            'id'        => 'li_post',
            'name'      => 'Posts',
            'type'      => 'post',
            'post_type' => 'post',
            'hidden' => array( 'item_layout', '!=', 'item_post' ),
          ),
          array(
            'name'       => 'Categorias',
            'id'         => 'li_taxonomy',
            'type'       => 'taxonomy',
            'taxonomy'   => 'category',
            'field_type'  => 'radio',
            'hidden' => array( 'item_layout', '!=', 'item_taxonomy' ),
          ),
          array(
            'id'    => 'li_custom_layout',
            'name'  => 'Estilo',
            'type'  => 'select',
            'std' => 'li_custom_layout_link',
            'options' => array(
                'li_custom_layout_link'        => 'Link (Padrão)',
                'li_custom_layout_dropdown'    => 'Dropdown',
            ),
            'hidden' => array( 'item_layout', '!=', 'item_link' ),
          ),
          array(
            'name'       => 'Título do Item',
            'id'         => 'li_custom_desc',
            'type'       => 'text',
            'hidden' => array( 'item_layout', '!=', 'item_link' ),
          ),
          array(
            'name'       => 'Descrição do Item',
            'id'         => 'li_custom_title',
            'type'       => 'text',
            'hidden' => array( 'item_layout', '!=', 'item_link' ),
          ),
          array(
            'name'       => 'Link (href)',
            'id'         => 'li_custom_link',
            'type'       => 'text',
            'hidden' => array( 'item_layout', '!=', 'item_link' ),
          ),
          array(
            'name' => 'Item do Dropdown',
            'id'   => 'ul_custom_dropdown',
            'type' => 'group',
            'clone' => true,
            'sort_clone' => true,
            'visible' => array(
              array('item_layout', 'item_link'),
              array('li_custom_layout', 'li_custom_layout_dropdown'),
            ),
            'fields' => array(
              array(
                'id'    => 'sub_item_layout',
                'name'  => '',
                'type'  => 'select',
                'std' => 'sub_item_pagina',
                'options' => array(
                    'sub_item_pagina'    => 'Páginas (Padrão)',
                    'sub_item_post'    => 'Posts',
                    'sub_item_taxonomy'    => 'Categorias',                
                    'sub_item_link'    => 'Link Personalizado',
                ),
              ),
              array(
                'id'        => 'sub_li_pagina',
                'name'      => 'Páginas',
                'type'      => 'post',
                'post_type' => 'page',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_pagina' ),
              ),
              array(
                'id'        => 'sub_li_post',
                'name'      => 'Posts',
                'type'      => 'post',
                'post_type' => 'post',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_post' ),
              ),
              array(
                'name'       => 'Categorias',
                'id'         => 'sub_li_taxonomy',
                'type'       => 'taxonomy',
                'taxonomy'   => 'category',
                'field_type'  => 'radio',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_taxonomy' ),
              ),
              array(
                'name'       => 'Título do Item',
                'id'         => 'sub_li_custom_title',
                'type'       => 'text',
              ),
              array(
                'name'       => 'Link (href)',
                'id'         => 'sub_li_custom_link',
                'type'       => 'text',
                'hidden' => array( 'sub_item_layout', '!=', 'sub_item_link' ),
              ),
            ),
          ),
        )
      ),
      // Descrição Do Rodapé
      array(
        'type' => 'heading',
        'name' => 'Descrição Final',
        'desc' => 'Descrição no Rodapé',
        'tab'  => 'footer',
      ),
      array(
        'id'   => 'footer_desc',
        'name' => '',
        'type'    => 'wysiwyg',
        'raw'     => false,
        'options' => array(
            'textarea_rows' => 2,
            'teeny'         => true,
        ),
        'tab'  => 'footer',
      ),

      // Extras
      array(
        'type' => 'heading',
        'name' => 'Códigos para o cabeçalho (Avançado)',
        'desc' => 'Códigos para inserir no site (Pixel, GTM e etc)',
        'tab'  => 'extras',
      ),
      array(
        'name' => '',
        'id'   => 'head_rows',
        'type' => 'group',
        'tab'  => 'extras',
        'clone' => true,
        'fields' => array(
          array(
              'name'  => '',
              'id'    => 'row',
              'type'  => 'textarea',
              'placeholder' => '<script>/<link>/<meta>',
          ),
        )
      ),
      array(
        'type' => 'heading',
        'name' => 'Códigos para o rodapé (Avançado)',
        'desc' => 'Códigos para inserir scripts no site',
        'tab'  => 'extras',
      ),
      array(
        'name' => '',
        'id'   => 'footer_rows',
        'type' => 'group',
        'tab'  => 'extras',
        'clone' => true,
        'fields' => array(
          array(
              'name'  => '',
              'id'    => 'row',
              'type'  => 'textarea',
              'placeholder' => '<script>/<link>/<meta>',
          ),
        )
      ),
    ),
  );

  return $meta_boxes;

}