<?php

while ( have_rows('modules') ) : the_row();
	if(get_row_layout() == 'intro') {

	// Explain fondo gris claro ?>

		<div class="description">
			<wrap>
				<div>
					<h2>Introducción</h2>
					<h1><?php the_sub_field('title'); ?></h1>
					<div><?php the_sub_field('description'); ?></div>
				</div>
			</wrap>
		</div><?php




	// Explain fondo gris claro

	} elseif(get_row_layout() == 'explain') {
		$bgImg = get_sub_field( 'bg-img' );
		$img_large = wp_get_attachment_image_src($bgImg, 'large');
		if(get_post_field('post_title', $bgImg)){
			$bgCap = get_post_field('post_title', $bgImg);
		} elseif(get_post_field('post_excerpt', $bgImg)) {
			$bgCap = get_post_field('post_excerpt', $bgImg);
		} elseif(get_post_field('post_content', $bgImg)) {
			$bgCap = get_post_field('post_content', $bgImg);
		} ?>

		<div class="explanation" style="<?php if($bgImg){
				echo 'background-image: url('.$img_large[0].'); ';
				if(get_sub_field('bg-position')){
					echo 'background-position: '.get_sub_field('bg-position').';';
				}
			} ?>" >
			<wrap>
				<div>
					<?php if(get_sub_field('title')) { echo '<h2>'.get_sub_field('title').'</h2>'; } ?>
					<div>
						<?php the_sub_field('description'); ?>
						<p class="bg-caption"><?php if($bgCap){echo 'Imagen: '.$bgCap; } $bgCap = ''; ?></p>
					</div>
				</div>
			</wrap>
		</div><?php




	// Video

	} elseif(get_row_layout() == 'video') {
		$bgImg = get_sub_field( 'bg-img' );
		$img_large = wp_get_attachment_image_src($bgImg, 'large'); ?>


		<div class="video" style="<?php if($bgImg){
				echo 'background-image: url('.$img_large[0].'); ';
				if(get_sub_field('bg-position')){
					echo 'background-position: '.get_sub_field('bg-position').';';
				}
			} ?>" >
			<div><?php
				$rows = get_sub_field('new-video');
					$cuantos = count($rows);

					if($cuantos < 2) { 		// Solo tiene 1 video.
						while ( have_rows('new-video') ) : the_row();

							if(get_sub_field('has_desc')){} else { echo '<div class="no-description">';} ?>
								<div class="video-container"><?php

									if(get_sub_field('source') == 'ul') { ?>
										<video width="640" height="360" <?php // width="100%"
											$bgImg = get_sub_field( 'bg-img' );
											$img_large = wp_get_attachment_image_src($bgImg, 'large');
											if($bgImg) {
												echo 'poster="'.$img_large[0].'"';
											}  ?> controls="controls" preload="none">
											<source type="video/mp4" src="<?php the_sub_field('video'); ?>" /><?php

											/* Flash Fallback
											<object width="100%" type="application/x-shockwave-flash" data="js/flashmediaelement.swf">
											<param name="movie" value="js/flashmediaelement.swf" />
											<param name="flashvars" value="controls=true&file=<?php the_sub_field('video'); ?>" />
											<?php if(get_sub_field('$bgImg')) { echo '<img src="poster="'.$img_large.'" width="100%" title="No video playback capabilities" />'; } ?>
											</object> */  ?>
										</video><?php

									} elseif(get_sub_field('source') == 'yt'){ ?>
										<iframe src="https://www.youtube.com/embed/<?php the_sub_field('yt_code'); ?>" frameborder="0" allowfullscreen></iframe><?php

										/* Themear youtube con nuestro player. No funciona el resize.
										<video width="100%" controls="controls" preload="none">
											<source type="video/youtube" src="http://www.youtube.com/watch?v=<?php the_sub_field('yt_code'); ?>" />
										</video> */
									} ?>

								</div><?php

							if(get_sub_field('has_desc')){} else { echo '</div>';}
							if(get_sub_field('has_desc')){ ?>
								<div class="caption">
									<h1><?php the_sub_field('title'); ?></h1>
									<p><?php echo get_sub_field('description'); ?></p>
								</div><?php
							}
					endwhile;

				// Muchos videos.
				} else {
					echo get_template_part('inc/vid-slider');
				} ?>
			</div>
		</div><?php




	// De la colección

	} elseif(get_row_layout() == 'de_la_coleccion') { ?>

		<div class="collection" id="collection-post">
			<wrap><?php
				if(get_sub_field('title')) { echo '<h2>'.get_sub_field('title').'</h2>'; }
				$post_objects = get_sub_field('pieces');

				if( $post_objects ):
					echo '<ul class="masonry cards">';
					foreach( $post_objects as $post):
					    setup_postdata($post);
						echo get_template_part('inc/cards');
				    endforeach;
					echo '</ul>';
					wp_reset_postdata();
				endif; ?>
			</wrap>
		</div><?php


// Slider
	} elseif(get_row_layout() == 'slider') {
		echo get_template_part('inc/exp-slider');




// Imagen con su explicación

	} elseif(get_row_layout() == 'explain_image') {
		$bgImg = get_sub_field( 'image' );
		$img_large = wp_get_attachment_image_src($bgImg, 'large');
		if(get_post_field('post_title', $bgImg)){
			$bgCap = get_post_field('post_title', $bgImg);
		} elseif(get_post_field('post_excerpt', $bgImg)) {
			$bgCap = get_post_field('post_excerpt', $bgImg);
		} elseif(get_post_field('post_content', $bgImg)) {
			$bgCap = get_post_field('post_content', $bgImg);
		} ?>

			<div class="explanation image">

				<wrap><?php
					if(get_sub_field('order') == 'right') { ?>

						<div>
							<?php if(get_sub_field('title')) { echo '<h2>'.get_sub_field('title').'</h2>'; } ?>
							<div>
								<?php the_sub_field('description'); ?>
							</div>
						</div><?php

						if(is_singular('post')) { ?>
							<div>
								<img src="<?php echo $img_large[0]; ?>">
								<p class="bg-caption"><?php if($bgCap){echo 'Imagen: '.$bgCap; } $bgCap = ''; ?></p>
							</div><?php
						}

					} else {

						if(is_singular('post')) { ?>
							<div>
								<img src="<?php echo $img_large[0]; ?>">
								<p class="bg-caption"><?php if($bgCap){echo 'Imagen: '.$bgCap; } $bgCap = ''; ?></p>
							</div><?php
						} ?>
						<div>
							<?php if(get_sub_field('title')) { echo '<h2>'.get_sub_field('title').'</h2>'; } ?>
							<div>
								<?php the_sub_field('description'); ?>
							</div>
						</div><?php

					}  ?>
				</wrap><?php

				if(is_page('cafe')) { ?>
					<div class="outer_image" style="background-image:url(<?php echo $img_large[0]; ?>);">
					</div><?php
				} ?>

			</div><?php




// Frase con imagen de fondo

	} elseif(get_row_layout() == 'quote_img') {
		$bgImg = get_sub_field( 'bg_img' );
		$img_large = wp_get_attachment_image_src($bgImg, 'large');
		if(get_post_field('post_title', $bgImg)){
			$bgCap = get_post_field('post_title', $bgImg);
		} elseif(get_post_field('post_excerpt', $bgImg)) {
			$bgCap = get_post_field('post_excerpt', $bgImg);
		} elseif(get_post_field('post_content', $bgImg)) {
			$bgCap = get_post_field('post_content', $bgImg);
		} ?>

			<div class="quote image">
				<wrap>
					<div class="bg-img" style="background-image:url(<?php echo $img_large[0]; ?>);"></div>
					<div>
						<blockquote>
							<?php the_sub_field('quote'); ?>
						</blockquote>
						<h2><?php the_sub_field('author'); ?></h2>
						<p class="bg-caption"><?php if($bgCap){echo 'Imagen: '.$bgCap; } $bgCap = ''; ?></p>
					</div>
				</wrap>
			</div><?php




// Free Style

	} elseif(get_row_layout() == 'free_style') { ?>

		<div class="free-style">
			<wrap>
				<?php the_sub_field('content'); ?>
			</wrap>
		</div><?php




// Menu

	} elseif(get_row_layout() == 'menu') { ?><?php

		get_template_part('inc/pgwd/tabs');


// Guía del Maestro

	} elseif(get_row_layout() == 'teachers_guide') { ?>

		<div class="guide">
			<wrap><?php
				the_sub_field('description');
				$file = get_sub_field('file');
				if( $file ): ?>
					<a href="<?php echo $file['url']; ?>" class="button" target="_blank"><?php echo $file['title']; ?></a>
				<?php endif; ?>
			</wrap>
		</div><?php

	}

endwhile; ?>
