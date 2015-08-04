<?php 	
	
	$videos = get_sub_field('new-video');

	if ( have_rows('new-video') ) : 
		$count = count($videos);
		$i = 0; ?>
		<ul id="video-slider" class="rslides">

	<?php 	while ( have_rows('new-video') ) : the_row(); ?>
		<li class="slide <?php 
			if(get_sub_field('has_desc')){} else { 
				echo "no-description ";
			} the_sub_field('source'); ?>">

			<div class="video-container">
				<?php if(get_sub_field('source') == 'ul') { ?>
				
					<video width="640" height="360" <?php // width="100%" 
						$bgImg = get_sub_field( 'bg-img' );
						$img_large = wp_get_attachment_image_src($bgImg, 'large'); 
						if('$bgImg') {
							echo 'poster="'.$img_large[0].'"';
						}  ?> controls="controls" preload="none">
					    <source type="video/mp4" src="<?php the_sub_field('video'); ?>" />
					</video>

				<?php } elseif(get_sub_field('source') == 'yt'){ ?> 
					<?php //<iframe width="420" height="315" src="https://www.youtube.com/embed/8PSm98vOctk" frameborder="0" allowfullscreen></iframe>
					echo '<iframe src="https://www.youtube.com/embed/'.get_sub_field('yt_code').'" frameborder="0" allowfullscreen></iframe>'; ?>
				<?php } ?>
			</div>

			<div class="caption">
				<?php if(get_sub_field('has_desc')){ ?>
					<h1><?php the_sub_field('title'); ?></h1>
					<p><?php echo get_sub_field('description'); ?></p>
				<?php } ?>
				<div class="bottom">
					<div class="counter">
					    <span class="current"><?php echo ++$i; ?></span> / <span class="total"><?php echo $count; ?></span>
					</div>
				</div>
			</div>
		</li>
	<?php 	endwhile; 
		echo "</ul>";
		endif; ?>