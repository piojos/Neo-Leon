	<article>

<?php 	echo get_template_part('inc/heading'); ?>


		<div class="contain">
			<wrap>

			<div<?php
			if(!get_field('description')){
				echo ' class="video-container video"';
			} else {
				echo ' class="video has-caption"';
			}?>><?php

				if(get_field('slct_src') == 'upload') { ?>

					<video width="640" height="360" <?php // width="100%"
						$bgImg = get_post_thumbnail_id( $post_id );
						$img_large = wp_get_attachment_image_src($bgImg, 'large');
						if('$bgImg') {
							echo 'poster="'.$img_large[0].'"';
						}  ?> controls="controls" preload="none">
						<source type="video/mp4" src="<?php the_field('src_ul'); ?>" />
					</video><?php

				} elseif(get_field('slct_src') == 'youtube'){
					echo '<iframe width="853" height="480" src="https://www.youtube.com/embed/'.get_field('src_yt').'" frameborder="0" allowfullscreen></iframe>';
				}

				if(get_field('description')){ ?>
					<div class="caption">
						<?php the_field('description'); ?>
					</div><?php
				} ?>
			</div>

			</wrap>
		</div>

	</article>

	<?php echo get_template_part('inc/more_news'); ?>

<script>

	$('.video-container video').mediaelementplayer({
		features: ['playpause', 'current', 'progress', 'duration'],
	});

	$(".video-container").fitVids();

</script>
