<?php
	$endDate = strtotime(get_field('end_time'));
	echo '<br>Hasta el '.date_i18n('j', $endDate).' de '.date_i18n('F', $endDate);
	if(date_i18n('Y', $endDate) == current_time('Y')) {
		echo '.</p>';
	} else {
		echo ' del '.date_i18n('Y', $endDate).'.</p>';
	}
?>
