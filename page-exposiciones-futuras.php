<?php
	/* Template Name: Exposiciones */
	get_header(); ?>

	<div class="heading list">
		<div>
			<h3>EXPOSICIONES: </h3>
			<ul class="dropdown">
				<li>
					<h1><?php the_title(); ?></h1>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/exposiciones/' ) ); ?>">Actuales</a></li>
						<li><a href="<?php echo esc_url( home_url( '/exposiciones/exposiciones-futuras/' ) ); ?>">Futuras</a></li>
						<li><a href="<?php echo esc_url( home_url( '/exposiciones/archivo-de-exposiciones/' ) ); ?>">Archivo</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>

	<section id="events-post"><?php

		$args = array(
			'post_type' => 'post',
			'meta_value' => 'Temporal',
			'meta_key' => 'temporal',
			'meta_value' => 'futuro'
		);
		$exPerm = new WP_Query( $args );

		if ( $exPerm->have_posts() ) { ?>

		<h2 class="wrap"><?php the_title(); ?></h2>
			<ul class="masonry cards"><?php
			while ( $exPerm->have_posts() ) { $exPerm->the_post();
				$image = get_post_thumbnail_id( $post_id );
				$img_med = wp_get_attachment_image_src($image, 'medium');

				get_template_part('inc/cards');
			}
			echo '</ul>';
		} else {
			echo '<wrap style="text-align: center;"><h2>Todavía no hay exposiciones futuras programadas.</h2></wrap>';
		}

	?></section>

<?php get_footer(); ?>
