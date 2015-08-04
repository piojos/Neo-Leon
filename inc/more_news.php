<?php

	$args = array(
		'post_type' => get_post_type(),
		'posts_per_page' => 4,
		'post__not_in' => array(get_the_ID())
	);

	if(is_singular('pieza')){
		$cTerm = get_the_terms($post->ID, 'coleccion');	
		$args = array(
			'post_type' => get_post_type(),
			'posts_per_page' => 4,
			'post__not_in' => array(get_the_ID()),
			'tax_query' => array(
				array(
					'taxonomy' => 'coleccion',
					'field'    => 'slug',
					'terms'    => $cTerm[0]->slug,
				),
			),
			'orderby' => 'rand'
		);
	}

	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) : 
		$obj = get_post_type_object( get_post_type( get_the_ID() ) ); ?>

	<div class="more_news">
		<wrap>

			<h2>Más <?php echo $obj->labels->name; ?></h2>

			<ul class="cards">
	<?php 
		while ( $the_query->have_posts() ) {
			$the_query->the_post(); 
			$ftd_img = get_post_thumbnail_id( $post_id );
			$img_med = wp_get_attachment_image_src($ftd_img, 'medium'); ?>

				<?php echo get_template_part('inc/cards'); ?>

	<?php } ?>

			</ul>
		</wrap>
	</div>

<?php 

	endif;
	wp_reset_postdata(); ?>