<?php 

if(get_field('day_or_dates') == 'day') :
	$ctDays = 0;
	while ( have_rows('days') ) : the_row();
		$ctDays++;
		$unixtimestamp = strtotime(get_sub_field('date'));
		if($ctDays == 1){} else {
			echo '<br>';
		}
		echo date_i18n('l, j', $unixtimestamp).' de '.date_i18n('F', $unixtimestamp);

		$numb = get_sub_field('hours');
		$number = count($numb);

		if( have_rows('hours') ) { 
			$ctHours = 0;
			echo " a las ";
			while( have_rows('hours') ) { the_row();
				$ctHours++;
				if($ctHours >= 2) { 
					if ($ctHours == $number){ echo ' y ';}
					else { echo ', '; }
				}
				the_sub_field('time');
			}
		}
		echo ".";
	endwhile;




elseif(get_field('day_or_dates') == 'days') :

	if( have_rows('dates') ):
		while ( have_rows('dates') ) : the_row();

			$startDay = strtotime(get_sub_field('start-day'));
			$endDay = strtotime(get_sub_field('end-day'));

			if(get_sub_field('options') == 'end'){
				echo 'Los fines de semana del ';
			} elseif(get_sub_field('options') == 'week'){ 
				echo 'De lunes a viernes, del ';
			} elseif(get_sub_field('options') == 'all'){
				echo 'Todos los dias del ';
			}
			if(date_i18n('F', $startDay) == date_i18n('F', $endDay)) {
				echo date_i18n(' j', $startDay).' al '.date_i18n('j', $endDay).' de '.date_i18n('F', $endDay).' del '.date_i18n('Y', $endDay).'.';
			} else { // Different Months
				echo date_i18n('l, j', $startDay).' de '.date_i18n('F', $startDay).' al '.date_i18n('j', $endDay).' de '.date_i18n('F', $endDay).' del '.date_i18n('Y', $endDay).'.';
			}
			if(get_sub_field('schedule')){
				echo '<br>De '.get_sub_field('schedule').'hrs.';
			}

			// echo 'Del '.date_i18n('l, j', $unixtimestamp).' de '.date_i18n('F', $unixtimestamp);

		endwhile;
	endif;

endif; ?>