<?php 
	
	// $bodyClass = "home";
	// $newsletter = 1;

get_header(); ?>

	<?php echo get_template_part('inc/slider'); ?>

	<?php echo get_template_part('inc/search-box'); ?>
	
	<?php echo get_template_part('inc/featured-posts'); ?>
	

<?php 

	$bg3m = get_field('bg-tres-museos');
	$bg3mImg = wp_get_attachment_image_src($bg3m, 'largest'); 
	if(get_field('tres-museos')) : ?>
		<div class="tres_museos" style="background-image: url('<?php echo $bg3mImg[0]; ?>');">
			<div class="mask"></div>
			<wrap>
				<h3>Conoce los 3 Museos</h3>
				<dl>
		<?php 	while ( have_rows('tres-museos') ) : the_row(); 
					echo '<div>
							<a href="'.get_sub_field('link').'" title="Mas del '.get_sub_field('name').'">
								<dt>'.get_sub_field('name').'</dt>
							</a>
							<dd>'.get_sub_field('description').'</dd>	
						</div>';
				endwhile; ?>
				</dl>
			</wrap>
		</div>
	<?php 
	endif; ?>


	
	<?php echo get_template_part('inc/store'); ?>
	<?php 

	if(get_field('friends')) : ?>
		<div class="friends">
			<wrap>
				<h3>Nuestros Patrocinadores</h3>
				<ul>
		<?php 	while ( have_rows('friends') ) : the_row(); 
				$logo = get_sub_field('logo');
				$logoSrc = wp_get_attachment_image_src($logo, 'medium');
					echo '<li>
							<a href="http://'.get_sub_field('link').'" target="_blank">
								<img src="'.$logoSrc[0].'" />
							</a>
						</li>';
				endwhile; ?>
				</ul>
			</wrap>
		</div>
	<?php 
	endif;


	/* ?>

	<div class="easy-access">
		<ul>
			<li><a href="#">Todas las exposiciones</a></li>
			<li><a href="#">3 Museos</a></li>
			<li><a href="#">Nuevo en Tienda</a></li>
			<li><a href="#">Reserva un espacio</a></li>
		</ul>
	</div>


<?php */ get_footer(); ?>