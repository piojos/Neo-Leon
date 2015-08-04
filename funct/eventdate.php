<?php 

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
	endwhile; ?>