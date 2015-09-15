<?php

	// Eventos Archive Template
	get_header();
	echo get_template_part('inc/slider');
	echo get_template_part('inc/search-box'); 



	$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
	$niceDay = date_i18n('l, j', strtotime($date)).' de '.date_i18n('F Y.', strtotime($date));		

	$prev_date = date('d+M+Y', strtotime($date .' -1 day'));
	$next_date = date('d+M+Y', strtotime($date .' +1 day'));

	$prev_df = date('Ymd', strtotime($date .' -1 day'));
	$next_df = date('Ymd', strtotime($date .' +1 day'));


	$prev_url = '?';
		if(isset($_GET["evType"])){
			$prev_url .= 'evType='.$_GET["evType"];			
		}
		if(isset($_GET["museum"])){
			$prev_url .= '&museum='.$_GET["museum"];			
		}
		if($_GET['date']){
			$prev_url .= '&date='.$prev_date;			
		} else {
			$prev_url .= 'date='.$prev_date;						
		}
		if($_GET['dateFormat']){
			$prev_url .= '&dateFormat='.$prev_df;			
		} else {
			$prev_url .= '&dateFormat='.$prev_df;						
		}

	$next_url = '?';
		if(isset($_GET["evType"])){
			$next_url .= 'evType='.$_GET["evType"];			
		}
		if(isset($_GET["museum"])){
			$next_url .= '&museum='.$_GET["museum"];			
		}
		if($_GET['date']){
			$next_url .= '&date='.$next_date;			
		} else {
			$next_url .= 'date='.$next_date;						
		}
		if($_GET['dateFormat']){
			$next_url .= '&dateFormat='.$next_df;			
		} else {
			$next_url .= '&dateFormat='.$next_df;						
		} ?>

		<section id="<?php
			if(get_post_type() == 'eventos') { echo 'events-post'; }
			elseif(get_post_type() == 'noticias') { echo 'news-post'; }
			else { echo 'news-post'; }
		?>">

		<div class="nav"><wrap>
			<a href="<?php echo $prev_url ?>" class="button">&lt;</a>
			<h2><?php echo $niceDay; ?></h2>
			<a href="<?php echo $next_url ?>" class="button r">&gt;</a>
		</wrap></div>

		<?php echo get_template_part('inc/loop2'); ?>

		</section><?php

	get_footer(); ?>
