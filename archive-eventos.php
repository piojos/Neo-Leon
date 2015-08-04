<?php 

	// Eventos Archive Template

	get_header();

		echo get_template_part('inc/slider');
		
		echo get_template_part('inc/search-box'); ?>

		<section id="<?php 
			if(get_post_type() == 'eventos') { echo 'events-post'; }
			elseif(get_post_type() == 'noticias') { echo 'news-post'; }
			else { echo 'news-post'; }
		?>">

		<div class="nav"><wrap>
			<a href="" class="button">&lt;</a>
			<h2><?php echo current_time('l, F j Y.'); ?></h2>
			<a href="" class="button r">&gt;</a>
		</wrap></div>

<?php	/*	<div class="wrap debug" style="margin-bottom: 2em; text-align: center; background-color: white; padding: 1em;">
			
			$today = current_time('l');
			$todoy = 'Saturday';
			$weekdays = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
			$weekends = array('Saturday', 'Sunday');


			echo 'Hoy es '.$today.'. ';

			if(in_array($today, $weekends)){
				$isWkEnd = TRUE;
				$isWkDay = FALSE;
				echo 'Vamos de fiesta.';
			} elseif(in_array($today, $weekdays)){
				$isWkDay = TRUE;
				$isWkEnd = FALSE;
				echo 'Vamos a trabajar.';
			} 


		</div> */ ?>


		<?php echo get_template_part('inc/loop'); ?>

		</section>
<?php

 	get_footer(); ?>