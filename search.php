<?php 
	
	get_header(); 

	$ftd_img = get_field( 'search_bg', 'options' );
	$img_med = wp_get_attachment_image_src($ftd_img, 'medium');
	$img_large = wp_get_attachment_image_src($ftd_img, 'large');
	$img_larger = wp_get_attachment_image_src($ftd_img, 'larger');
	$img_largest = wp_get_attachment_image_src($ftd_img, 'largest');
	$img_huge = wp_get_attachment_image_src($ftd_img, 'huge'); ?>


<div class="search_box">
<?php 	echo '<style>
		.search_box {background-image: url(' . $img_med[0] . ');}';
		if($img_large) { echo ' @media (min-width: 600px) { .search_box {background-image: url(' . $img_large[0] . ');} }'; }
		if($img_larger) { echo ' @media (min-width: 1024px) { .search_box {background-image: url(' . $img_larger[0] . ');} }'; }
		if($img_largest) { echo ' @media (min-width: 1400px) { .search_box {background-image: url(' . $img_largest[0] . ');} }'; }
		if($img_huge) { echo ' @media (min-width: 1800px) { .search_box {background-image: url(' . $img_huge[0] . ');} }'; }
		echo '</style>';  ?>
	<div class="mask"></div>
	<div class="content">

		<h2><?php /* if(is_search()){ echo 'Mostrando resultados para: "<span class="">'.get_search_query().'</span>"'; } else { the_title(); } */ ?></h2>
		<form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo('url') ?>">
			<label>Mostrando resultados para: </label>
			<input type="text" value="<?php the_search_query(); ?>" name="s" id="s"><br>
			<input type="submit" id="searchsubmit" value="Volver a Buscar">
		</form>

	</div>			
</div>

	<section id="events-post">
		<?php echo get_template_part('inc/loop'); ?>
	</section>

<?php get_footer(); ?>
