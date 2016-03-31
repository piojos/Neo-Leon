<?php

	/*
	 * Template Name: Archive Template
	 */

	get_header();
	$nl = get_field('nl-activate');


	if($post->post_type == 'pieza') {

		get_template_part('inc/heading', 'coleccion');

	} else {

		get_template_part('inc/heading');

		// echo get_template_part('inc/search-box'); ?>

		<section id="<?php
			if(get_post_type() == 'eventos') { echo 'events-post'; }
			elseif(get_post_type() == 'noticias') { echo 'news-post'; }
			else { echo 'news-post'; }
		?>"><?php

			get_template_part('inc/loop'); ?>

		</section><?php

	}

	get_footer(); ?>
