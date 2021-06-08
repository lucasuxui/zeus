<?php

 add_filter('rwmb_meta_boxes', 'wpcf_meta_boxes_tax');

 function wpcf_meta_boxes_tax($meta_boxes) {

    return $meta_boxes;

 }