<?php 

/*
 *	Single Handler
 */

get_header(); 

	while (have_posts()) : the_post(); 

		if(get_post_type(get_the_ID()) == "pieza") : 

			echo get_template_part('inc/single', 'collection');
			get_footer();


		elseif(get_post_type(get_the_ID()) == "noticias") : 

			echo get_template_part('inc/single', 'news');
			get_footer();


		elseif(get_post_type(get_the_ID()) == "eventos") : 

			echo get_template_part('inc/single', 'events');
			get_footer();


		elseif(get_post_type(get_the_ID()) == "post") :

			echo get_template_part('inc/single', 'exposicion');


		elseif(get_post_type(get_the_ID()) == "videos") :

			echo get_template_part('inc/single', 'video');
			get_footer();

		else : ?>

			<div class="heading">
				<wrap>
					<h1>404</h1>
					<p>No encontramos esa página</p>
				</wrap>
			</div>

<?php		get_footer();

		endif;

	endwhile;
 ?>