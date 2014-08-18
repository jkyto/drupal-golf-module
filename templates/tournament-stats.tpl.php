  
  <div id="tournament-statistics">
    <h2><?php print t('Statistics'); ?></h2>

    <table class="tournament-stats">
    
    <thead>
      <tr>
        <th></th>
        <th><?php print t('Contests played')?></th>
        <th><?php print t('Total hits')?></th>
        <th><?php print t('Hit average')?></th>
        <th><?php print t('HCP total')?></th>
        <th><?php print t('Eagle')?></th>
        <th><?php print t('Birdie')?></th>
        <th><?php print t('Par')?></th>
        <th><?php print t('Bogey')?></th>
        <th><?php print t('Double bogey')?></th>
        <th><?php print t('Triple bogey')?></th>
        <th><?php print t('10+')?></th>
        <th><?php print t('Par3')?></th>
        <th><?php print t('Par4')?></th>
        <th><?php print t('Par5')?></th>
      </thead>

    <tbody>


      <?php

      $i = 0;
      foreach ($players as $key => $pl) {
        $i++;
        
        print '<tr>';
        print '<td class="player-name">'.$pl['player']->title.'</td>';
        print '<td class="stat">'.$pl['contests_played'].'</td>';
        print '<td class="stat">'.$pl['stats']['total_score'].'</td>';

        $hit_average = 0;
        if($pl['contests_played'] > 0)
          $hit_average = $pl['stats']['total_score']/$pl['contests_played'];
        else
          $hit_average = '-';
        
        print '<td class="stat">'.$hit_average.'</td>';
        print '<td class="stat">'.$pl['stats']['net_score'].'</td>';
        print '<td class="stat">'.$pl['stats']['eagle'].'</td>';
        print '<td class="stat">'.$pl['stats']['birdie'].'</td>';
        print '<td class="stat">'.$pl['stats']['par'].'</td>';
        print '<td class="stat">'.$pl['stats']['bogey'].'</td>';
        print '<td class="stat">'.$pl['stats']['double-bogey'].'</td>';
        print '<td class="stat">'.$pl['stats']['triple-bogey'].'</td>';
        print '<td class="stat">'.$pl['stats']['10_plus'].'</td>';

        $par3_average = '-';
        $par4_average = '-';
        $par5_average = '-';

        if(isset($pl['stats']['par3_average']))
          $par3_average = number_format($pl['stats']['par3_average'],2);
        if(isset($pl['stats']['par4_average']))
          $par4_average = number_format($pl['stats']['par4_average'],2);
        if(isset($pl['stats']['par5_average']))
          $par5_average = number_format($pl['stats']['par5_average'],2);

        print '<td class="stat">'.$par3_average.'</td>';
        print '<td class="stat">'.$par4_average.'</td>';
        print '<td class="stat">'.$par5_average.'</td>';
        print '</tr>';
      }
      ?>
    </tbody>
  </table>
</div>
