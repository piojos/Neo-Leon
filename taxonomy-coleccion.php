<?php get_header(); ?>

	<?php echo get_template_part('inc/heading', 'coleccion'); ?>

	<section id="collection-post"><?php 
		echo get_template_part('inc/loop'); ?>
	</section>


<?php get_footer(); ?>