<?php
/**
 * @file
 * golf_scores.features.inc
 */

/**
 * Implements hook_node_info().
 */
function golf_scores_node_info() {
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
