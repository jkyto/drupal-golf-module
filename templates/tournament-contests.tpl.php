<div id="tournament-contests"><h2><?php print t('Contests'); ?></h2>
<?php

$contests_markup = '';

  foreach ($contests as $key => $contest) { 
    $course = $contest['course'];

    if(isset($course)){

      $date = field_get_items('node', $contest['contest'], 'field_date');
      $formatted_date = date('d.m.Y', strtotime($date[0]['value']));
      
      print '<div class="contest">';
      
      if(user_access('administer nodes')){
        $query = array();
        $query['destination'] = current_path();
        print l('Edit', 'node/'.$key.'/edit', array('query'=>$query,'attributes' => array('class' => array('edit-node edit-link','btn'))));
      }

      print '<h3>'.$course->title.'</h3>';
      print '<p class="contest-date">'.$formatted_date.'</p>';

      $course_body = field_get_items('node', $course, 'body');
      print $course_body[0]['value'];

      print $contest['html'];
      
      if(user_access('administer nodes')){
        $query = array();
        $query['contest_id'] = $contest['contest']->nid;
        $query['destination'] = current_path();

        print l('Add round', 'node/add/round', array('query'=>$query,'attributes' => array('class' => array('add-round','btn'))));
      }

      print '</div>';
    }
  }
  print '</div>';