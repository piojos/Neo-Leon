<?php

	// $terms = get_the_terms( $post->ID, 'coleccion' );
	// if ( $terms && ! is_wp_error( $terms ) ) :
	// 	foreach ( $terms as $term ) {
	// 		$draught_links = $term->slug;
	// 	}
	// endif;

	if( is_tax() ) {
		global $wp_query;
		$term = $wp_query->get_queried_object();
		$slug = $term->slug;
		echo $title;
	}

	$today = date('Ymd',strtotime("-1 day"));

	if (is_page('eventos')) {
		global $post;
		$pSlug = $post->post_name;


		query_posts(
			array(
				'post_type'		=> $pSlug,
				'posts_per_page' => 12,
				'paged'			=> get_query_var( 'paged' ),
				'meta_query'	=> array(
					array(
						'key'		=> 'days_%_date',
						'compare'	=> '>=',
						'value'		=> $today,
					)
				),
				'orderby' => 'meta_value_num',
				'order' => 'ASC'
			)
		);
	} elseif (is_page('videos')) {
		query_posts(
			array(
				'posts_per_page' => -1,
				'post_type' => 'videos'
			)
		);
	} elseif(is_page()){
		global $post;
		$pSlug = $post->post_name;
		query_posts(
			array(
				'post_type' => $pSlug,
				'posts_per_page' => 12,
				'paged' => get_query_var( 'paged' )
			)
		);
	} elseif (is_tax('coleccion') && $paged == '0' ) {
		query_posts(
			array(
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => 'coleccion',
						'field'    => 'slug',
						'terms'    => $slug,
						'include_children' => false,
					)
				),
				'post_type' => 'pieza'
			)
		);
	}



	if ( have_posts() ) {
		echo '<ul class="masonry cards">';
		while ( have_posts() ) { the_post();

			echo get_template_part('inc/cards');

		}
		echo '</ul>';

		if (function_exists("pagination")) {
			pagination($additional_loop->max_num_pages);
		}
	}

?>
