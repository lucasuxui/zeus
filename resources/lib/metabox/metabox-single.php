<?php



  add_filter('rwmb_meta_boxes', 'wpcf_meta_boxes_single');

  function wpcf_meta_boxes_single($meta_boxes) {


  return $meta_boxes;

}