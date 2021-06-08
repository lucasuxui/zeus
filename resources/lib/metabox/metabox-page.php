<?php



  add_filter('rwmb_meta_boxes', 'wpcf_meta_boxes_page');

  function wpcf_meta_boxes_page($meta_boxes) {

    //=================================== HOME PAGE ================================================
    $meta_boxes[] = array(
      'id'             => 'pages',
      'title'          => 'Campos da Home',
      'context'        => 'normal',
      'pages'          => array('page'),
      // 'include'        => array(
      //   'relation'     => 'OR',
      //   'template'     => array('views/template-home.blade.php'),
      // ),
      'fields'         => array(
        // BANNER
        array(
          'type' => 'heading',
          'name' => 'Banner',
          'desc' => 'Informações do Banner',          
        ),
        array(
          'id'   => 'banner_subtitle',
          'name' => 'Subtítulo Pequeno',
          'type'    => 'text',
        ),        
        array(
          'id'   => 'banner_title',
          'name' => 'Titulo',
          'type'    => 'wysiwyg',
          'raw'     => false,
          'options' => array(
              'textarea_rows' => 2,
              'teeny'         => true,
          ),
        ),
        array(
          'id'   => 'banner_text',
          'name' => 'Texto',
          'type'    => 'wysiwyg',
          'raw'     => false,
          'options' => array(
            'textarea_rows' => 2,
            'teeny'         => true,
          ),
        ),
        array(
          'name' => 'Imagem do Banner',
          'id'   => 'banner_image',
          'type' => 'single_image',
        ),
        array(
          'id'    => 'cta_select_banner',
          'name'  => 'Selecionar Botão',
          'type'  => 'select',
          'options' => get_button_styles(),             
          'std' => 'layout_padrao',
          'callback' => 'metabox_button_options',
        ),
        array(
          'type' => 'heading',
          'name' => 'Banner - Lista de Ícones',          
        ),
        array(
          'name'  => '',
          'id'   => 'banner_list_rows',
          'type'  => 'group',
          'clone' => true,
          'fields'=> array(
            array(
              'name' => 'Icone',
              'id' => 'banner_list_icon',
              'type' => 'single_image',
            ),
            array(
              'name' => 'Titulo',
              'id' => 'banner_list_title',
              'type' => 'text',              
            ),
          )
        ),
        // SECTION AREAS CLONEABLE
        array(
          'type' => 'heading',
          'name' => 'Áreas Clonavéis',
          'desc' => 'Áreas que intercalam em sequência',
        ),
        array(
          'name' => '',
          'id'   => 'section_rows',
          'type' => 'group',
          'tab'  => 'info',
          'clone' => true,
          'fields' => array(
            array(
              'id'   => 'section_subtitle',
              'name' => 'Subtítulo Pequeno',
              'type'    => 'text',
            ),        
            array(
              'id'   => 'section_title',
              'name' => 'Titulo',
              'type'    => 'wysiwyg',
              'raw'     => false,
              'options' => array(
                  'textarea_rows' => 2,
                  'teeny'         => true,
              ),
            ),
            array(
              'id'   => 'section_text',
              'name' => 'Texto',
              'type'    => 'wysiwyg',
              'raw'     => false,
              'options' => array(
                'textarea_rows' => 4,
                'teeny'         => true,
              ),
            ),
            array(
              'id'    => 'cta_select',
              'name'  => 'Selecionar Botão',
              'type'  => 'select',
              'options' => get_button_styles(),             
              'std' => 'layout_padrao',
              'callback' => 'metabox_button_options',
            ),
            array(
              'id'    => 'section_type',
              'name'  => 'Layout da Seção',
              'type'  => 'select',
              'options' => array(
                  'layout_image'    => 'Modelo Padrão (Imagem)',
                  'layout_video'    => 'Modelo Vídeo'
              ),             
              'std' => 'layout_image',
            ),
            array(
              'name' => 'Imagem da Seção',
              'id'   => 'section_image',
              'type' => 'single_image'         
            ),
            array(
              'id'   => 'section_video',
              'name' => 'Link do Vídeo',
              'type' => 'oembed',
              'hidden' => array( 'section_type', '!=', 'layout_video' )
            ), 
          ),
        ),
        // SECTION VANTAGENS/PASSOS
        array(
          'type' => 'heading',
          'name' => 'Seção de Vantagens',
          'desc' => 'Insira as vantagens aqui',
        ),
        array(
          'name'  => 'Lista com Ícones',
          'id'   => 'vantagens_list_rows',
          'type'  => 'group',
          'clone' => true,
          'fields'=> array(
            array(
              'name' => 'Icone',
              'id' => 'vantagens_list_icon',
              'type' => 'single_image',
            ),
            array(
              'name' => 'Título',
              'id' => 'vantagens_list_title',
              'type' => 'text',              
            ),
            array(
              'name' => 'Texto',
              'id' => 'vantagens_list_text',
              'type' => 'textarea',
            ),
          )
        ),
        // BLOCO CTA
        array(
          'type' => 'heading',
          'name' => 'Bloco CTA (Call To Action)',
          'desc' => 'Insira as informações aqui',
        ),
        array(
          'name'  => '',
          'id'   => 'bloco_cta',
          'type'  => 'group',
          'fields'=> array(
            array(
              'name' => 'Título',
              'id' => 'bloco_ctatitle',
              'type' => 'text',              
            ),
            array(
              'name' => 'Texto',
              'id' => 'bloco_ctatext',
              'type'    => 'wysiwyg',
              'raw'     => false,
              'options' => array(
                'textarea_rows' => 2,
                'teeny'         => true,
              ),
            ),
            array(
              'id'    => 'cta_select_cta',
              'name'  => 'Selecionar Botão',
              'type'  => 'select',
              'options' => get_button_styles(),             
              'std' => 'layout_padrao',
              'callback' => 'metabox_button_options',
            ),
          )
        ),
        // SECTION DUO
        array(
          'type' => 'heading',
          'name' => 'Seção DUO (Texto e Imagem)',
          'desc' => 'Insira as informações aqui',
        ),
        array(
          'name' => '',
          'id'   => 'section_duo_rows',
          'type' => 'group',
          'tab'  => 'info',
          'clone' => true,
          'fields' => array(
            array(
              'id'   => 'section_subtitle',
              'name' => 'Subtítulo Pequeno',
              'type'    => 'text',
            ),        
            array(
              'id'   => 'section_title',
              'name' => 'Titulo',
              'type'    => 'wysiwyg',
              'raw'     => false,
              'options' => array(
                  'textarea_rows' => 2,
                  'teeny'         => true,
              ),
            ),
            array(
              'id'   => 'section_text',
              'name' => 'Texto',
              'type'    => 'wysiwyg',
              'raw'     => false,
              'options' => array(
                'textarea_rows' => 4,
                'teeny'         => true,
              ),
            ),
            array(
              'id'    => 'cta_select',
              'name'  => 'Selecionar Botão',
              'type'  => 'select',
              'options' => get_button_styles(),             
              'std' => 'layout_padrao',
              'callback' => 'metabox_button_options',
            ),
            array(
              'id'    => 'section_type',
              'name'  => 'Layout da Seção',
              'type'  => 'select',
              'options' => array(
                  'layout_image'    => 'Modelo Padrão (Imagem)',
                  'layout_video'    => 'Modelo Vídeo'
              ),             
              'std' => 'layout_image',
            ),
            array(
              'name' => 'Imagem da Seção',
              'id'   => 'section_image',
              'type' => 'single_image'
            ),
            array(
              'id'   => 'section_video',
              'name' => 'Link do Vídeo',
              'type' => 'oembed',
              'hidden' => array( 'section_type', '!=', 'layout_video')
            ), 
          ),
        ),
        // SECTION DESTAQUES
        array(
          'type' => 'heading',
          'name' => 'Seção Destaque',
          'desc' => 'Insira as informações aqui',
        ),
        array(
          'id'   => 'destaque_subtitle',
          'name' => 'Subtítulo Pequeno',
          'type'    => 'text',
        ),        
        array(
          'id'   => 'destaque_title',
          'name' => 'Titulo',
          'type'    => 'wysiwyg',
          'raw'     => false,
          'options' => array(
              'textarea_rows' => 2,
              'teeny'         => true,
          ),
        ),
        array(
          'id'   => 'destaque_text',
          'name' => 'Texto',
          'type'    => 'wysiwyg',
          'raw'     => false,
          'options' => array(
            'textarea_rows' => 2,
            'teeny'         => true,
          ),
        ),
        array(
          'name'  => 'Lista com Ícones',
          'id'   => 'destaque_list_rows',
          'type'  => 'group',
          'clone' => true,
          'fields'=> array(
            array(
              'name' => 'Icone',
              'id' => 'destaque_list_icon',
              'type' => 'single_image',
            ),
            array(
              'name' => 'Título',
              'id' => 'destaque_list_title',
              'type' => 'text',              
            ),
            array(
              'name' => 'Texto',
              'id' => 'destaque_list_text',
              'type' => 'textarea',
            ),
          )
        ),
        // SECTION DUO FOOTER
        array(
          'type' => 'heading',
          'name' => 'Seção DUO - RODAPÉ (Texto e Imagem)',
          'desc' => 'Insira as informações aqui',
        ),
        array(
          'name' => '',
          'id'   => 'section_duo_footer_rows',
          'type' => 'group',
          'tab'  => 'info',
          'clone' => true,
          'fields' => array(
            array(
              'id'   => 'section_subtitle',
              'name' => 'Subtítulo Pequeno',
              'type'    => 'text',
            ),        
            array(
              'id'   => 'section_title',
              'name' => 'Titulo',
              'type'    => 'wysiwyg',
              'raw'     => false,
              'options' => array(
                  'textarea_rows' => 2,
                  'teeny'         => true,
              ),
            ),
            array(
              'id'   => 'section_text',
              'name' => 'Texto',
              'type'    => 'wysiwyg',
              'raw'     => false,
              'options' => array(
                'textarea_rows' => 4,
                'teeny'         => true,
              ),
            ),
            array(
              'id'    => 'cta_select',
              'name'  => 'Selecionar Botão',
              'type'  => 'select',
              'options' => get_button_styles(),             
              'std' => 'layout_padrao',
              'callback' => 'metabox_button_options',
            ),
            array(
              'id'    => 'section_type',
              'name'  => 'Layout da Seção',
              'type'  => 'select',
              'options' => array(
                  'layout_image'    => 'Modelo Padrão (Imagem)',
                  'layout_video'    => 'Modelo Vídeo'
              ),             
              'std' => 'layout_image',
            ),
            array(
              'name' => 'Imagem da Seção',
              'id'   => 'section_image',
              'type' => 'single_image'
            ),
            array(
              'id'   => 'section_video',
              'name' => 'Link do Vídeo',
              'type' => 'oembed',
              'hidden' => array( 'section_type', '!=', 'layout_video')
            ), 
          ),
        ),
      ), 
    );
    return $meta_boxes;
  return $meta_boxes;

}