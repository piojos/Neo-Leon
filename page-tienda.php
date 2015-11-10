<?php

	/*
	 * Template Name: No title, No sidebar.
	 */

	// $bodyClass = "info single";
	// $newsletter = 0;

	$bClass = 'not_nos';

	get_header();
	while (have_posts()) : the_post(); ?>

	<article>
		<div class="contain">
			<wrap>
				<?php the_content(); ?>
			</wrap>
		</div>
	</article><?php

	endwhile;
	get_footer(); ?>
