<?php

/**
 * Implementation of hook_imagecache_default_presets().
 */
function blog_roll_imagecache_default_presets() {
  $items = array(
    'user_image_default' => array(
      'presetname' => 'user_image_default',
      'actions' => array(
        '0' => array(
          'weight' => '0',
          'module' => 'imagecache',
          'action' => 'imagecache_scale_and_crop',
          'data' => array(
            'width' => '200',
            'height' => '200',
          ),
        ),
      ),
    ),
    'user_image_small' => array(
      'presetname' => 'user_image_small',
      'actions' => array(
        '0' => array(
          'weight' => '0',
          'module' => 'imagecache',
          'action' => 'imagecache_scale_and_crop',
          'data' => array(
            'width' => '50',
            'height' => '50',
          ),
        ),
      ),
    ),
  );
  return $items;
}

/**
 * Implementation of hook_views_api().
 */
function blog_roll_views_api() {
  return array(
    'api' => '2',
  );
}
