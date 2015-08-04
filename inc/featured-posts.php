<?php
$post_objects = get_field('dont-miss');
$count = count( $post_objects );

if( $post_objects ): ?>
<div class="featured_posts<?php 
	if($count == 1) {
		echo ' one-post';
	} elseif ($count == 2) {
		echo ' two-posts';
	} elseif ($count >= 3) {
		echo ' three-posts';
	} ?>">
	<ul class="wrap">
		<li class="title">
			<h1>NO TE PIERDAS</h1>
		</li>
    <?php foreach( $post_objects as $post): 
    	setup_postdata($post); 
		$oBgImg = get_post_thumbnail_id();
		$bgImgSrc = wp_get_attachment_image_src($oBgImg, 'large'); 
		define('inside', 'humpty'); ?>

		<li>
			<a href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $bgImgSrc[0]; ?>');">
				<div class="mask"></div>
				<div class="tag">
					<?php echo get_template_part('funct/tag'); ?>
				</div>

				<div class="txt">
					<h1><?php the_title(); ?></h1>
					<h2><?php the_field('museum'); ?></h2>
				</div>						
			</a>
		</li>	

    <?php endforeach; ?>
	</ul>
</div>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>