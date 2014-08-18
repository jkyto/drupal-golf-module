

<div id="tournament-ranking">
  <h2><?php print t('Ranking'); ?></h2>

  <table class="tournament-ranking">
  <thead>
    <tr>
      <th></th>

      <?php 
      foreach ($contests as $i => $contest) {
          print '<th>'.$contests[$i]['course']->title.'</th>';
      }
      ?>

      <th></th>
    </tr>
  </thead>


  <tbody>
  <?php
  // $out .= '';
  
  $i = 0;

  foreach ($players as $key => $pl) {
    $i++;

    print '<tr>';
    print '<td class="player-name ranking" data-value="'.$i.'"><span class="position">'.$i.'.</span>'.$pl['player']->title.'</td>';

    foreach ($contests as $contest_id => $contest) {
      $score = FALSE;
      $penalty = FALSE;

      
      if(array_key_exists($contest_id, $players[$key]['contests'])){
        if($contests[$contest_id]['publish_results']){
            $score = $players[$key]['contests'][$contest_id]['stats']['net_score'];
          }
      }else{
        if($contest['publish_results'] == 1){
          $score = '*';
        }
      }

      $friendly_net_score = $score;

      if($score === 0) $friendly_net_score = 'E';
      if($score > 0) $friendly_net_score = '+'.$score;

      $data_score = (is_numeric($score) ? $score : 99999);

      if($score){
        print '<td class="score" data-value="'.$data_score.'">'.$friendly_net_score.'</td>';
      }else{
        print '<td class="empty score" data-value="">-</td>';
      }
    }

    $data_total_net_score = (is_numeric($players[$key]['stats']['net_score']) ? $players[$key]['stats']['net_score'] : 99999);

    print '<td class="total net" data-value="'.$players[$key]['stats']['net_score'].'">';

    $friendly_net_total_score = $players[$key]['stats']['net_score'];

    if($friendly_net_total_score === 0) $friendly_net_total_score = 'E';
    if($friendly_net_total_score > 0) $friendly_net_total_score = '+'.$friendly_net_total_score;

    print $friendly_net_total_score;
    print '</td>';

    print '</tr>';
  }
  
  ?>
  </tbody>
  </table>

  <div class="ranking-helpers helper-wrapper"><em class="helper">* <?php print t('Skipped contest (+%penalty strikes)',array('%penalty'=>PENALTY_VALUE)); ?></em></div>

</div>