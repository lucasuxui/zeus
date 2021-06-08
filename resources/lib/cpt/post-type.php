<?php

/**

* Custom Post Types

*/

// function post_type_funcionalidades_register() {

//     $labels = array(
//         'name'          => 'Funcionalidades',
//         'singular_name' => 'Funcionalidade',
//         'menu_name'     => 'Funcionalidades',
//         'add_new'       => _x('Adicionar Funcionalidade', 'item'),
//         'add_new_item'  => __('Adicionar Novo Funcionalidade'),
//         'edit_item'     => __('Editar Funcionalidade'),
//         'new_item'      => __('Novo Funcionalidade')
//     );
//     $args = array(
//         'labels'             => $labels,
//         'public'             => true,
//         'publicly_queryable' => true,
//         'show_ui'            => true,
//         'show_in_menu' => true,
//         'query_var' => true,
//         'rewrite' => array('slug' => 'funcionalidades'),
//         'capability_type' => 'post',
//         'has_archive' => false,
//         'hierarchical' => true,
//         'menu_position' => 4,
//         'menu_icon' => 'dashicons-screenoptions',
//         'supports' => array('title', 'thumbnail', 'excerpt')
//     );
//     register_post_type('funcionalidades', $args);

// }
// add_action('init', 'post_type_funcionalidades_register');

// function post_type_segmentos_register() {

//     $labels = array(
//         'name'          => 'Segmentos',
//         'singular_name' => 'Segmento',
//         'menu_name'     => 'Segmentos',
//         'add_new'       => _x('Adicionar novo segmento', 'item'),
//         'add_new_item'  => __('Adicionar novo segmento'),
//         'edit_item'     => __('Editar segmento'),
//         'new_item'      => __('Novo segmento')
//     );
//     $args = array(
//         'labels'             => $labels,
//         'public'             => true,
//         'publicly_queryable' => true,
//         'show_ui'            => true,
//         'show_in_menu' => true,
//         'query_var' => true,
//         'rewrite' => array('slug' => 'segmentos'),
//         'capability_type' => 'post',
//         'has_archive' => false,
//         'hierarchical' => true,
//         'menu_position' => 5,
//         'menu_icon' => 'dashicons-rest-api',
//         'supports' => array('title','editor','thumbnail')
//     );
//     register_post_type('segmentos', $args);

// }
// add_action('init', 'post_type_segmentos_register');
