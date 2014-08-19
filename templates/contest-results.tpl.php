<table class="contest-results" id="contest-results-table-<?php print($contest->nid);?>">
	<thead>
		<tr>
			<th></th><th></th>
			<?php 
			foreach ($course->holes as $key => $value) {    
			    print '<th>'.$value['hole'].'</th>';

			    if ($value['hole'] == 9 ) 
			      print '<th>'.t('Out').'</th>';

			    if ($value['hole'] == 18 ){
			      print '<th>'.t('In').'</th>';
			      print '<th>'.t('Total').'</th>';
			      print '<th>'.t('Net').'</th>';

			      if($can_edit) print '<th></th>';
			    }

			  }
			 ?>
		</tr>
		<tr>
			<th></th>
			<th><?php print t('Par'); ?> </th>
			<?php

			$course_in = 0;
			$course_out = 0;
			$course_total = 0;

		  foreach ($course->holes as $key => $value) {
		    $course_total += $value['par'];
		    
		    if($value['hole'] <= 9) {
		      $course_out += $value['par'];
		    }else if($value['hole'] <= 18) {
		      $course_in += $value['par'];
		    }

		    print '<th>'.$value['par'].'</th>';

		    if($value['hole'] == 9) 
		      print '<th>'.$course_out.'</th>';

		    if($value['hole'] == 18){ 
		      print '<th>'.$course_in.'</th>';
		      print '<th>'.$course_total.'</th>';
		      print '<th></th>';
		      if($can_edit) print '<th></th>';
		    }

		  }
			?>
		</tr>
	
	</thead>





	<tbody>
  
	<?php 
  $enabled_card_explanations = array();

  foreach ($players as $i => $card) {
    
    $position = $i+1;
    
    print '<tr>';
    print '<td class="expand" data-value="'.$position.'"><a href="#" data-action="toggle" data-target="child-row">+</a></td>';
    print '<td class="player-name ranking" data-value="'.$position.'">';
    print '<a href="#" data-action="toggle" data-target="child-row"><span class="position">'.$position.'.</span><span class="name">'.$card['player']->title.'</span> <i class="icon"></i></a>';
    print '';
    print '</td>';
    
    foreach ($card['holes'] as $j => $score) {
      $classes = 'score ';
      if(isset($score['name'])){
        $classes .= $score['name'];
        $enabled_card_explanations[] = $score['name'];
      }
      
      $friendly_score = ($score['score'] ? $score['score'] : 99999);

      print '<td class="'.$classes.'" data-value="'.$friendly_score.'">'.$score['score'].'</td>';

      if($j == 9){
        $out = $card['stats']['out'];
        if($card['stats']['out'] == 0) $out = '';

        $fr_out = ($out ? $out : 'false');

        print '<td class="out" data-value="'.$fr_out.'">'.$out.'</td>';
      }
      if($j == 18){
        $in = $card['stats']['in'];

        if($card['stats']['in'] == 0) $in = '';

        $fr_in = ($in ? $in : 99999);

        print '<td class="in" data-value="'.$fr_in.'">'.$in.'</td>';
        print '<td class="total-score" data-value="'.$card['stats']['total_score'].'">'.$card['stats']['total_score'].'</td>';
        
        $friendly_net_score = $card['stats']['net_score'];

        if($card['stats']['net_score'] == 0) $friendly_net_score = 'E';
        if($card['stats']['net_score'] > 0) $friendly_net_score = '+'.$friendly_net_score;


        print '<td class="net-score" data-value="'.$card['stats']['net_score'].'">'.$friendly_net_score.'</td>';

        if($can_edit){
          print '<td class="edit">'.l('Edit','node/'.$card['round_id'].'/edit', array('query' => array('destination'=>current_path()))).'</td>';
        }
      }

    }
    print '</tr>';
    ?>
		
		<?php
		$number_of_columns = 23;
		if($can_edit) $number_of_columns = 24;
		?>

    <tr class="child-row round-stats" style="display:none;">
    	<td></td>
    	<td colspan="<?php print $number_of_columns; ?>">
    		

    		<div class="round-stats-wrapper clearfix">
    			<div class="round-stat-wrapper column-1">
    				<h3><?php print t('Player info'); ?></h3>
    				<?php 
    					$hcp = FALSE;
    					$playing_hcp = FALSE;
    					
    					$field_hcp = field_get_items('node', $card['round'], 'field_hcp');
    					$field_playing_hcp = field_get_items('node', $card['round'], 'field_playing_hcp');

    					if(isset($field_hcp[0]['value'])) $hcp = $field_hcp[0]['value'];
    					if(isset($field_playing_hcp[0]['value'])) $playing_hcp = $field_playing_hcp[0]['value'];

    				?>

    				<?php if($hcp) : ?>
	    				<div class="stat hcp">
	    				<?php print '<span class="stat-label">'.t('HCP') .'</span> <span class="stat-value">'.$hcp.'</span>'; ?>
	    				</div>
	    			<?php endif; ?>

	    			<?php if($playing_hcp) : ?>
		    			<div class="stat hcp">
	    				<?php print '<span class="stat-label">'.t('Playing HCP') .'</span> <span class="stat-value">'.$playing_hcp.'</span>'; ?>
	    				</div>
	    			<?php endif; ?>

	    			<?php if(!$playing_hcp && !$hcp) : ?>
	    			<div class="stat player-info-na">
	    				<em><?php print t('n/a'); ?></em>
	    			</div>
	    			<?php endif; ?>
    			</div>
	    		<div class="round-stat-wrapper column-2">
	    			<h3><?php print t('Averages'); ?></h3>
	    			<div class="stat par3-average">
	    				<?php print '<span class="stat-label">'.t('Par 3 average') .'</span> <span class="stat-value">'.$card['stats']['par3_average'].'</span>'; ?>
	    			</div>
	    			<div class="stat par4-average">
	    				<?php print '<span class="stat-label">'.t('Par 4 average') .'</span> <span class="stat-value">'.$card['stats']['par4_average'].'</span>'; ?>
	    			</span> 
	    			</div>
	    			<div class="stat par5-average">
	    				<?php print '<span class="stat-label">'.t('Par 5 average') .'</span> <span class="stat-value">'.$card['stats']['par5_average'].'</span>'; ?>
	    			</div> 
	    		</div>
	    		<div class="round-stat-wrapper column-3">
	    			<h3><?php print t('Par and under'); ?></h3>
	    			<?php if($card['stats']['hole-in-one']) : ?>
		    			<div class="stat hole-in-one">
		    				<?php print '<span class="stat-label">'.t('Hole-in-ones') .'</span> <span class="stat-value">'.$card['stats']['hole-in-one'].'</span>'; ?>
		    			</div>
	    			<?php endif; ?>
						
						<?php if($card['stats']['albatross']) : ?>
		    			<div class="stat albatross">
		    				<?php print '<span class="stat-label">'.t('Albatrosses') .'</span> <span class="stat-value">'.$card['stats']['albatross'].'</span>'; ?>
		    			</div>
	    			<?php endif; ?>

	    			<?php if($card['stats']['eagle']) : ?>
		    			<div class="stat eagle">
		    				<?php print '<span class="stat-label">'.t('Eagles') .'</span> <span class="stat-value">'.$card['stats']['eagle'].'</span>'; ?>
		    			</div>
	    			<?php endif; ?>

	    			<div class="stat birdie">
	    				<?php print '<span class="stat-label">'.t('Birdies') .'</span> <span class="stat-value">'.$card['stats']['birdie'].'</span>'; ?>
	    			</div>
	    			<div class="stat par">
	    				<?php print '<span class="stat-label">'.t('Pars') .'</span> <span class="stat-value">'.$card['stats']['par'].'</span>'; ?>
	    			</div>
	    		</div>
	    		<div class="round-stat-wrapper column-4">
	    			<h3><?php print t('Over par'); ?></h3>
	    			<div class="stat bogey">
	    				<?php print '<span class="stat-label">'.t('Bogeys') .'</span> <span class="stat-value">'.$card['stats']['bogey'].'</span>'; ?>
	    			</div>
	    			<div class="stat double-bogey">
	    				<?php print '<span class="stat-label">'.t('Double bogeys') .'</span> <span class="stat-value">'.$card['stats']['double-bogey'].'</span>'; ?>
	    			</div>
	    			<div class="stat triple-bogey">
	    				<?php print '<span class="stat-label">'.t('Triple bogeys') .'</span> <span class="stat-value">'.$card['stats']['triple-bogey'].'</span>'; ?>
	    			</div>

	    			<?php if($card['stats']['10_plus']) : ?>
		    			<div class="stat ten-plus">
		    				<?php print '<span class="stat-label">'.t('10+') .'</span> <span class="stat-value">'.$card['stats']['10_plus'].'</span>'; ?>
		    			</div>
		    		<?php endif; ?>

	    		</div>
	    	</div>
    	</td>
    </tr>
  <?php } ?>

  </tbody>

</table>

<?php
if($card_color_explanations_enabled) :
	print '<div class="card-color-explanations">';
	 
	  if(in_array('hole-in-one', $enabled_card_explanations))
	    print '<div class="hole-in-one color-label"><span class="label"></span>'.t('Hole-in-one').'</div>';
	 
	  if(in_array('albatross', $enabled_card_explanations))
	    print '<div class="albatross color-label"><span class="label"></span>'.t('Albatross').'</div>';
	  if(in_array('eagle', $enabled_card_explanations))
	    print '<div class="eagle color-label"><span class="label"></span>'.t('Eagle').'</div>';
	  if(in_array('birdie', $enabled_card_explanations))
	    print '<div class="birdie color-label"><span class="label"></span>'.t('Birdie').'</div>';
	  if(in_array('par', $enabled_card_explanations))
	    print '<div class="par color-label"><span class="label"></span>'.t('Par').'</div>';
	  if(in_array('bogey', $enabled_card_explanations))
	    print '<div class="bogey color-label"><span class="label"></span>'.t('Bogey').'</div>';

	print '</div>';
endif;


