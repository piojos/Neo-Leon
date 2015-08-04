<?php 

	// Archive Template

	get_header();
	if($post->post_type == 'pieza') { 

		echo get_template_part('inc/heading', 'coleccion');

	} else {

		echo get_template_part('inc/heading');
		
		// echo get_template_part('inc/search-box'); ?>
		
		<section id="<?php 
			if(get_post_type() == 'eventos') { echo 'events-post'; }
			elseif(get_post_type() == 'noticias') { echo 'news-post'; }
			else { echo 'news-post'; }
		?>">

			<?php echo get_template_part('inc/loop'); ?>

		</section>
<?php

	}

 	get_footer(); ?>




