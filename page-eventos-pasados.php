<?php

	/*
	 * Template Name: Past Events Template
	 */

	get_header();


	if($post->post_type == 'pieza') {

		get_template_part('inc/heading', 'coleccion');

	} else {

		get_template_part('inc/heading');

		// echo get_template_part('inc/search-box'); ?>

		<section id="events-post"><?php

			get_template_part('inc/loop'); ?>

		</section><?php

	}

	get_footer(); ?>
