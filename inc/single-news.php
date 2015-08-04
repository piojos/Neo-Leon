<?php 
	
	// $bodyClass = "news single";
	// $newsletter = 1;
	?>

	<article>

<?php 	echo get_template_part('inc/heading'); ?>


<?php 		$image = get_post_thumbnail_id( $post_id );
		
		if ($image) { echo '<div class="featured_img">'; }

			echo '<picture><!--[if IE 9]><video style="display: none;"><![endif]-->';
			$img_small = wp_get_attachment_image_src($image, 'thumbnail');
			$img_med = wp_get_attachment_image_src($image, 'medium');
			$img_large = wp_get_attachment_image_src($image, 'large');
			$img_larger = wp_get_attachment_image_src($image, 'larger');
			$img_largest = wp_get_attachment_image_src($image, 'largest');
			$img_huge = wp_get_attachment_image_src($image, 'huge');

			if($img_largest) { echo '<source srcset ="' . $img_huge[0] . '" media="(min-width: 1800px)">'; }
			if($img_larger) { echo '<source srcset ="' . $img_largest[0] . '" media="(min-width: 1400px)">'; }
			if($img_large) { echo '<source srcset ="' . $img_larger[0] . '" media="(min-width: 1024px)">'; }
			if($img_med) { echo '<source srcset ="' . $img_large[0] . '" media="(min-width: 600px)">'; }

			echo '<!--[if IE 9]></video><![endif]-->
				<img src="' . $img_med[0] . '" srcset ="' . $img_med[0] . '" title="" alt="">
			</picture>'; 

		if ($image) { echo '</div>'; } ?>


		<div class="contain">
			<wrap>
				<div class="back">
					<a onclick="history.go(-1);">REGRESAR</a>
				</div>
				<div class="content">
					<div class="date">
						<?php the_time(get_option('date_format')); ?>
					</div>
					<?php the_content(); ?>
				</div>
			</wrap>
		</div>

	</article>

	<?php echo get_template_part('inc/more_news'); ?>

