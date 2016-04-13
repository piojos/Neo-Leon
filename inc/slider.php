<?php


// HOME
if(is_front_page()) :

	if ( get_field('main-featured') ) :
		$i = 0;
		echo '<div class="slider"><ul class="rslides">';
		while ( have_rows('main-featured') ) : the_row();
			$post_object = get_sub_field('linke');
			$override = get_sub_field('override');
			$descOr = get_sub_field('description');
			$bgImgOr = get_sub_field('bg_img');
			$newBgImg = wp_get_attachment_image_src( $bgImgOr, 'largest' );
			$colorOr = get_sub_field('color');
			$rgbaOr = hex2rgba($colorOr, 0.8);
			$repNum = get_field('main-featured');
			$count = count($repNum);

			if( $post_object ):
				$post = $post_object;
				setup_postdata( $post );
					$oBgImg = get_post_thumbnail_id();
					$bgImgSrc = wp_get_attachment_image_src($oBgImg, 'largest');
					$expoEnd = strtotime(get_field('end_time'));
					$logoA = get_field('expo_logo');
					$logoSrc = wp_get_attachment_image_src($logoA, 'large');
					$color = get_field('bg-color');
					$rgba = hex2rgba($color, 0.8);
					 ?>

					<li class="slide">
						<a href="<?php the_permalink(); ?>">
							<div class="image" style="background: url('<?php
								if($override){
									if($bgImgOr) {
										echo $newBgImg[0];
									}
								} else {
									echo $bgImgSrc[0];
								} ?>'); background-size: cover;">
							</div>
						</a>
						<div class="caption" <?php if($override) {
							echo 'style="background-color:'.$rgbaOr.';"';
						} elseif($color) {
							echo 'style="background-color:'.$rgba.';"';
						} ?>>
							<a href="<?php the_permalink(); ?>">
								<h2><?php echo get_template_part('funct/tag'); ?></h2>
								<h1><?php if($logoA) {
										echo '<img class="exposition-logo" src="'.$logoSrc[0].'">';
									} else {
										the_title();
										} ?></h1>
								<p><?php
									if($override){
										if($descOr){
											echo $descOr;
										}
									} elseif('noticias' == get_post_type()){
										the_field('kicker');
									} else {
										the_field('description');
									} ?></p>
								<p class="details"><?php
									if(get_field('expo_status') == 'Temporal'){
										get_template_part('funct/expodate');
									} elseif('eventos' == get_post_type()) {
										echo get_template_part('funct/eventdate');
									} elseif('noticias' == get_post_type()) {
										echo get_the_time('j').' de '.get_the_time('F Y.');
									} ?></p>
							</a>
							<div class="bottom" <?php if($override) {
								echo 'style="background-color:'.$colorOr.';"';
							} elseif($color) {
								echo 'style="background-color:'.$color.';"';
							} ?>>
							<?php if($count == 1){} else { ?>
								<div class="counter">
								    <span class="current"><?php echo ++$i; ?></span> / <span class="total"><?php echo $count; ?></span>
								</div>
							<?php } ?>
							</div>
						</div>
					</li>

			    <?php wp_reset_postdata(); ?>
			<?php endif;

		endwhile;
		echo '</ul></div>';
	endif;



// Eventos
elseif($post->post_name == 'eventos') :

	$post_object = get_field('ftd_events');
	$count = count($post_object);

	if( $post_object ):
		$i = 0;
		echo '<div class="slider"><ul class="rslides">';
		// $post = $post_object;
		// print_r($post_object);
		foreach( $post_object as $post ):
		setup_postdata( $post );
			$oBgImg = get_post_thumbnail_id();
			$bgImgSrc = wp_get_attachment_image_src($oBgImg, 'largest');

			$expoEnd = strtotime(get_field('end_time'));
			$terms = get_the_terms( $post->ID, 'event-type');
			foreach ( $terms as $term ) {
				if($term->name == 'Ciclo') {
					$color = '#2AAED0';
					$rgba = hex2rgba($color, 0.8);
				}
			} ?>

			<li class="slide">
				<a href="<?php the_permalink(); ?>">
					<div class="image" style="background: url('<?php
						if($bgImg){
							echo $newBgImg[0];
						} else {
							echo $bgImgSrc[0];
						} ?>'); background-size: cover;"></div>
				</a>
				<div class="caption" <?php
				if($color) {
					echo 'style="background-color:'.$rgba.';"';
				} ?>>
					<a href="<?php the_permalink(); ?>">
						<h2 class="hidespan"><?php echo get_template_part('funct/tag'); ?></h2>
						<h1><?php if(get_field('logo')) {
								$logoA = get_field('logo');
								$logoSrc = wp_get_attachment_image_src($logoA, 'large');
								echo '<img class="exposition-logo" src="'.$logoSrc[0].'">';
							} else {
								the_title();
								} ?></h1>
						<p><?php
							if($desc){
								echo $desc;
							} elseif('noticias' == get_post_type()){
								the_field('kicker');
							} else {
								the_field('description');
							} ?></p>
						<p class="details"><?php
							if(get_field('expo_status') == 'Temporal'){
								get_template_part('funct/expodate');
							} elseif('eventos' == get_post_type()) {
								echo get_template_part('funct/eventdate');
							} elseif('noticias' == get_post_type()) {
								echo get_the_time('j').' de '.get_the_time('F Y.');
							} ?></p>
					</a>
					<div class="bottom" <?php if($color) {echo 'style="background-color:'.$color.';"';} ?>>

							<?php if($count == 1){} else { ?>
								<div class="counter">
								    <span class="current"><?php echo ++$i; ?></span> / <span class="total"><?php echo $count; ?></span>
								</div>
							<?php } ?>

					</div>
				</div>
			</li><?php

			wp_reset_postdata();
			$color = 0;
			$rgba = 0;
		endforeach;
	echo '</ul></div>';
	endif;



// Else
else :

	$images = get_field('slider');
	$count = count($images);
	$i = 0;

		if( $images ):
			echo '<div class="slider"><ul class="rslides">';
			foreach( $images as $image ):
			$color = get_field('bg-color');
			$rgba = hex2rgba($color, 0.8); ?>

			<li class="slide">
				<div class="image" style="background: url('<?php echo $image['sizes']['largest']; ?>'); background-size: cover;"></div>
				<div class="caption" <?php if($color) {echo 'style="background-color:'.$rgba.';"';} ?>>
					<h2><?php echo get_template_part('funct/tag'); ?></h2>
					<h1><?php $logoA = get_field('expo_logo');
							if($logoA) {
							$logoSrc = wp_get_attachment_image_src($logoA, 'large');
							echo '<img class="exposition-logo" src="'.$logoSrc[0].'">';
						} else {
							the_title();
							} ?></h1>

					<p><?php
						if(get_field('description')){
							the_field('description');
						} else {
							echo $image['caption'];
							} ?></p>
					<p class="details"><?php
						if(get_field('expo_status') == 'Temporal'){
							$endDate = strtotime(get_field('end_time'));

							if(get_field('end_time')) {
								get_template_part('funct/expodate');
							}
						}
						echo '<br>';
						if(get_field('schedule')){
							echo 'Horario: '.get_field('schedule');
						} else {
							echo '<a href="'.home_url('/contacto').'">Horario normal</a>.';
						} ?></p>

					<div class="bottom" <?php if($color) {echo 'style="background-color:'.$color.';"';} ?>>

							<?php if($count == 1){} else { ?>
								<div class="counter">
								    <span class="current"><?php echo ++$i; ?></span> / <span class="total"><?php echo $count; ?></span>
								</div>
							<?php } ?>

					</div>
				</div>
			</li>

	<?php   endforeach;
			echo '</ul></div>';
		endif;
endif; ?>
