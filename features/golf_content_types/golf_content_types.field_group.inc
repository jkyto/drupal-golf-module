<?php
/**
 * @file
 * golf_content_types.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function golf_content_types_field_group_info() {
  $export = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_in|node|course|form';
  $field_group->group_name = 'group_in';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'golf_course';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'In',
    'weight' => '13',
    'children' => array(
      0 => 'field_hole_10',
      1 => 'field_hole_11',
      2 => 'field_hole_12',
      3 => 'field_hole_13',
      4 => 'field_hole_14',
      5 => 'field_hole_15',
      6 => 'field_hole_16',
      7 => 'field_hole_17',
      8 => 'field_hole_18',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'In',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-in field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $export['group_in|node|course|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_in|node|round|form';
  $field_group->group_name = 'group_in';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'golf_round';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'In',
    'weight' => '16',
    'children' => array(
      0 => 'field_hole_10',
      1 => 'field_hole_11',
      2 => 'field_hole_12',
      3 => 'field_hole_13',
      4 => 'field_hole_14',
      5 => 'field_hole_15',
      6 => 'field_hole_16',
      7 => 'field_hole_17',
      8 => 'field_hole_18',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'In',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-in field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $export['group_in|node|round|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_out|node|course|form';
  $field_group->group_name = 'group_out';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'golf_course';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Out',
    'weight' => '3',
    'children' => array(
      0 => 'field_hole_1',
      1 => 'field_hole_2',
      2 => 'field_hole_3',
      3 => 'field_hole_4',
      4 => 'field_hole_5',
      5 => 'field_hole_6',
      6 => 'field_hole_7',
      7 => 'field_hole_8',
      8 => 'field_hole_9',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Out',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-out field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $export['group_out|node|course|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_out|node|round|form';
  $field_group->group_name = 'group_out';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'golf_round';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Out',
    'weight' => '6',
    'children' => array(
      0 => 'field_hole_1',
      1 => 'field_hole_2',
      2 => 'field_hole_3',
      3 => 'field_hole_4',
      4 => 'field_hole_5',
      5 => 'field_hole_6',
      6 => 'field_hole_7',
      7 => 'field_hole_8',
      8 => 'field_hole_9',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Out',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-out field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $export['group_out|node|round|form'] = $field_group;

  return $export;
}
