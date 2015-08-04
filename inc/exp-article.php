<?php 
    while ( have_rows('modules') ) : the_row();

    	if(get_row_layout() == 'intro') { ?>

			<div class="description">
				<wrap>
					<div>
						<h2>Introducción</h2>
						<h1><?php the_sub_field('title'); ?></h1>
						<div>
							<?php the_sub_field('description'); ?>
						</div>
					</div>
				</wrap>
			</div>


<?php  	} elseif(get_row_layout() == 'explain') { 
			$bgImg = get_sub_field( 'bg-img' );
			$img_large = wp_get_attachment_image_src($bgImg, 'large'); ?>

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
						</div>
					</div>
				</wrap>
			</div>


<?php  	} elseif(get_row_layout() == 'video') { 
			$bgImg = get_sub_field( 'bg-img' );
			$img_large = wp_get_attachment_image_src($bgImg, 'large'); ?>


			<div class="video" style="<?php if($bgImg){
					echo 'background-image: url('.$img_large[0].'); ';
					if(get_sub_field('bg-position')){
						echo 'background-position: '.get_sub_field('bg-position').';'; 
					}
				} ?>" >
				<div>
				<?php 	$rows = get_sub_field('new-video');
						$cuantos = count($rows);

						if($cuantos < 2) { 		// Solo tiene 1 video.  
						    while ( have_rows('new-video') ) : the_row(); ?>


						    	<?php if(get_sub_field('has_desc')){} else { echo '<div class="no-description">';} ?>
									<div class="video-container">
										<?php if(get_sub_field('source') == 'ul') { ?>

											<video width="640" height="360" <?php // width="100%" 
												$bgImg = get_sub_field( 'bg-img' );
												$img_large = wp_get_attachment_image_src($bgImg, 'large'); 
												if($bgImg) {
													echo 'poster="'.$img_large[0].'"';
												}  ?> controls="controls" preload="none">
											    <source type="video/mp4" src="<?php the_sub_field('video'); ?>" />

												<?php /* Flash Fallback

					<object width="100%" type="application/x-shockwave-flash" data="js/flashmediaelement.swf">
					<param name="movie" value="js/flashmediaelement.swf" />
					<param name="flashvars" value="controls=true&file=<?php the_sub_field('video'); ?>" />
					<?php if(get_sub_field('$bgImg')) { echo '<img src="poster="'.$img_large.'" width="100%" title="No video playback capabilities" />'; } ?>
					</object> */  ?>

											</video>
										<?php } elseif(get_sub_field('source') == 'yt'){ ?> 

											<iframe src="https://www.youtube.com/embed/<?php the_sub_field('yt_code'); ?>" frameborder="0" allowfullscreen></iframe>

											<?php /* Themear youtube con nuestro player. No funciona el resize.

					<video width="100%" controls="controls" preload="none">
					    <source type="video/youtube" src="http://www.youtube.com/watch?v=<?php the_sub_field('yt_code'); ?>" />
					</video> */ } ?>

									</div>
						    	<?php if(get_sub_field('has_desc')){} else { echo '</div>';} ?>


								<?php if(get_sub_field('has_desc')){ ?>
									<div class="caption">
										<h1><?php the_sub_field('title'); ?></h1>
										<p><?php echo get_sub_field('description'); ?></p>
									</div>
								<?php } ?>

				<?php 		endwhile;
					 	} else { 				// Muchos videos.
							echo get_template_part('inc/vid-slider'); 
						} 						// Fin. ?>
				</div>
			</div>


<?php  	} elseif(get_row_layout() == 'de_la_coleccion') { ?>

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
			</div>


<?php  	} elseif(get_row_layout() == 'slider') { ?>

			<?php echo get_template_part('inc/exp-slider'); ?>


<?php  	} elseif(get_row_layout() == 'explain_image') { 
			$bgImg = get_sub_field( 'image' );
			$img_large = wp_get_attachment_image_src($bgImg, 'large'); ?>

				<div class="explanation image">
					<wrap>
					<?php	if(get_sub_field('order') == 'right') { ?>
						<div>
							<?php if(get_sub_field('title')) { echo '<h2>'.get_sub_field('title').'</h2>'; } ?>
							<div>
								<?php the_sub_field('description'); ?>
							</div>
						</div>
						<div>
							<img src="<?php echo $img_large[0]; ?>">
						</div>


					<?php 	} else { ?>
						<div>
							<img src="<?php echo $img_large[0]; ?>">
						</div>
						<div>
							<?php if(get_sub_field('title')) { echo '<h2>'.get_sub_field('title').'</h2>'; } ?>
							<div>
								<?php the_sub_field('description'); ?>
							</div>
						</div>


					<?php 	}  ?>

					</wrap>
				</div>


<?php  	} elseif(get_row_layout() == 'quote_img') { 
			$bgImg = get_sub_field( 'bg_img' );
			$img_large = wp_get_attachment_image_src($bgImg, 'large'); ?>

				<div class="quote image">
					<wrap>
						<div class="bg-img" style="background-image:url(<?php echo $img_large[0]; ?>);"></div>
						<div>
							<blockquote>
								<?php the_sub_field('quote'); ?>
							</blockquote>
							<h2><?php the_sub_field('author'); ?></h2>
						</div>
					</wrap>
				</div>


<?php  	}

    endwhile; ?>






