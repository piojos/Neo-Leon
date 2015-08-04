<?php 

	// Eventos Archive Template

	get_header();

		echo get_template_part('inc/heading'); ?>

		<section id="video-posts">

		<?php echo get_template_part('inc/loop'); ?>

		</section>
<?php

 	get_footer(); ?>