<?php

	// $bodyClass = "info single";
	// $newsletter = 0;

	if(is_page('en-vivo')){
		$bClass = 'single-videos live';
	}
	get_header();
	while (have_posts()) : the_post(); ?>


	<article><?php

	echo get_template_part('inc/heading');
	$image = get_post_thumbnail_id( $post_id );

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

		<div class="contain" <?php
			$lastColor = get_field('bg-color');
			if($lastColor == "#FFF"){
				echo 'style="background-color:#FFF"';
			} ?> >
			<wrap><?php
				if(is_page('en-vivo')){
					// echo '<div class="back about-live">'.get_field('description').'</div>';
				} else {
					echo '<div class="back">';
					echo get_template_part('inc/sidelist').'</div>';
				} ?>

				<div class="content"><?php

				if(is_page('en-vivo')){
					the_field('embed');
				} else {
					the_content();
				}


// WIDGETS
				while ( have_rows('page') ) : the_row();
					if( get_row_layout() == 'content' ): ?>

						<div>
							<?php the_sub_field('content'); ?>
						</div><?php


					elseif( get_row_layout() == 'bg-color-select' ):

						get_template_part('inc/pgwd/bg-color-select');


					elseif( get_row_layout() == 'img_txt' ):

						get_template_part('inc/pgwd/img_txt');


					elseif( get_row_layout() == 'slider' ): ?>

						<div class="pg-c">
							<?php echo get_template_part('inc/exp-slider'); ?>
						</div><?php


					elseif( get_row_layout() == 'forms' ):

						get_template_part('inc/pgwd/forms');


					elseif(get_row_layout() == 'teachers_guide') :

						get_template_part('inc/pgwd/teachers-guide');


					elseif(get_row_layout() == 'tabs') :

						get_template_part('inc/pgwd/tabs');


					endif;
				endwhile; ?>

				</div>
			</wrap>
		</div>

	</article>
	<?php // echo get_template_part('inc/more_news'); ?>

<?php

	endwhile;
	get_footer(); ?>
