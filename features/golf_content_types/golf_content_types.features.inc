<?php
/**
 * @file
 * golf_content_types.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function golf_content_types_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function golf_content_types_node_info() {
  $items = array(
    'golf_contest' => array(
      'name' => t('Contest'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'golf_course' => array(
      'name' => t('Course'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Course name'),
      'help' => '',
    ),
    'golf_player' => array(
      'name' => t('Player'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Name'),
      'help' => '',
    ),
    'golf_round' => array(
      'name' => t('Round'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Round name'),
      'help' => '',
    ),
    'golf_tournament' => array(
      'name' => t('Tournament'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
