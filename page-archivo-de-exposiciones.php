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

	<section id="events-post">

		<h2 class="wrap"><?php the_title(); ?></h2>
		<?php 
		
		$args = array(
			'post_type' => 'post',
			'meta_value' => 'Temporal'
		);
		$exPerm = new WP_Query( $args );

		if ( $exPerm->have_posts() ) {
			echo '<ul class="masonry">';
			while ( $exPerm->have_posts() ) { $exPerm->the_post(); 
				$image = get_post_thumbnail_id( $post_id );
				$img_med = wp_get_attachment_image_src($image, 'medium'); ?>

			<li>
				<a href="<?php the_permalink(); ?>">
					<div class="feature-img">
						<img src="<?php echo $img_med[0]; ?>" atl="3 museos">
					</div>
					<div class="description"> 
						<h1><?php the_title(); ?></h1>
						<?php if(get_field('museum')){ 
								echo '<p>'.get_field('museum'); 
							} if(get_field('end_time')) {
								$endDate = strtotime(get_sub_field('end_time'));
								echo '<br>Hasta el '.date_i18n('j', $endDate).' de '.date_i18n('F', $endDate).'.</p>';
							} else { 
								echo '</p>'; 
							} ?>
					</div>
				</a>
			</li>

		<?php
			} 
			echo '</ul>';
		}

	?></section>

<?php get_footer(); ?>