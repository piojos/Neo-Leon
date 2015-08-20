<?php	$images = get_sub_field('slider-gallery');
		if( $images ):
		$count = count($images); 
		$i = 0; ?>

		<div class="slider">
			<ul class="rslides">
	        <?php foreach( $images as $image ): ?>
	            <li class="slide <?php 
					if($image['width'] < $image['height']){ echo 'vertical'; } ?>">
					<div class="image" style="background: url('<?php echo $image['sizes']['largest']; ?>'); background-size: cover;"></div>
					<div class="caption">
						<h2><?php echo $image['caption']; ?></h2>
						<div class="bottom">
							<div class="counter">
							    <span class="current"><?php echo ++$i; ?></span> / <span class="total"><?php echo $count; ?></span>
							</div>
						</div>
					</div>
	            </li>
	        <?php endforeach; ?>
			</ul>
		</div>
<?php 	endif; ?>