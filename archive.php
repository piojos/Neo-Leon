<?php

	/*
	 * Template Name: Archive Template
	 */

	get_header();


	if($post->post_type == 'pieza') {

		get_template_part('inc/heading', 'coleccion');

	} else {

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		if($post->post_name == 'eventos') {
			if($paged == 1) {
				get_template_part('inc/slider');
			}
		}

		if($post->post_name == 'eventos') {
			if(get_field('has_searchbox')) {
				get_template_part('inc/search-box');
			} else {
				get_template_part('inc/heading');
			}
		}
		if($post->post_name != 'eventos') {
			get_template_part('inc/heading');
		} ?>

		<section id="<?php
			if($post->post_name == 'eventos') { echo 'events-post'; }
			else { echo 'news-post'; }
		?>"><?php

			get_template_part('inc/loop'); ?>

		</section><?php

	}

	get_footer(); ?>
