<?php 
	
	// $bodyClass = "collection single";
	// $newsletter = 0;
	
	$image = get_post_thumbnail_id( $post_id );
	$img_large = wp_get_attachment_image_src($image, 'large');
	$img_huge = wp_get_attachment_image_src($image, 'huge');
	
	$image_width = $img_large[1];
	$image_height = $img_large[2];

	?>

	<?php echo get_template_part('inc/heading', 'coleccion'); ?>

	<div class="piece<?php if ($image_width < $image_height) { echo " vertical"; } ?>">
		<wrap>
			<div>
				<div>
					<img src="<?php echo $img_large[0]; ?>">
				</div>
			</div>
			<div>
				<h1><?php the_title(); ?></h1>
				<div class="specs">
				<?php 
				    while ( have_rows('specs') ) : the_row();

				        echo '<h2>'.get_sub_field('title').'</h2>';

				        the_sub_field('info');

				    endwhile;

				    while ( have_rows('location-cont') ) : the_row();

				    	if(get_sub_field('museum')== '') {}
				    	else {
					        echo '<h2>Ubicación</h2>
							<ul>
								<li>'.get_sub_field('ubicacion').'</li>
								<li>'.get_sub_field('museum').'</li>
							</ul>';
				    	}

				    endwhile; ?>
				</div>
			</div>
		</wrap>
	</div>

<?php if(get_field('content')){ ?>
	<div class="contain">
		<wrap>
			<div class="content">
				<?php the_field('content'); ?>
			</div>
		</wrap>
	</div>
<?php } ?>

	<?php echo get_template_part('inc/more_news'); ?>

<script>
	$(document).ready(function(){
		$('.piece wrap > div:nth-child(1)').zoom({url: '<?php echo $img_huge[0]; ?>'});
	});
</script>

