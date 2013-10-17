<?php

/**
 * @file
 * Include file for defining views handlers and data.
 */

/**
 * Implementation of hook_views_handlers().
 */
function views_ifempty_views_handlers() {
  return array(
    'info' => array(
      'path' => drupal_get_path('module', 'views_ifempty') . '/handlers',
    ),
    'handlers' => array(
      'views_ifempty_handler_field' => array(
        'parent' => 'views_handler_field',
      ),
    ),
  );
}

/**
 * Implementation of hook_views_data().
 */
function views_ifempty_views_data() {
  $data['views_ifempty']['table']['group'] = t('Views If Empty');
  $data['views_ifempty']['table']['join'] = array(
    '#global' => array(),
  );

  $data['views_ifempty']['views_ifempty'] = array(
    'title' => t('Views If Empty'),
    'help' => t('Output a field if another field is empty'),
    'field' => array(
      'handler' => 'views_ifempty_handler_field',
    ),
  );

  return $data;
}
