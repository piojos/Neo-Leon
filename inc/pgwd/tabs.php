<?php

	$bgImg = get_sub_field('bg-img');
	$bgImgUrl = wp_get_attachment_image_src( $bgImg, 'larger' ); ?>

<div class="menu">
	<wrap style="background-image: url(<?php echo $bgImgUrl[0]; ?>)"><?php

		if(get_sub_field('title')){
			echo '<h1>'.get_sub_field('title').'</h1>';
		} ?>

		<ul class="tabs FU_B"><?php
			$a = 1;
			while ( have_rows('repeater') ) : the_row();
				echo '<li';
				if($a == 1){
					echo ' class="current"';
				}
				echo '><a href="#tab-'.$a++.'">'.get_sub_field('title').'</a></li>';
			endwhile; ?>
		</ul>


		<div class="tContent"><?php
			$b = 1;
			while ( have_rows('repeater') ) : the_row();
				if (get_sub_field('2_cols')) {
					$classes = 'cols_2';
				}
				if($b == 1){
					$shhi = 'style="display:inline"';
				} else {
					$shhi = 'style="display:none"';
				}?>
				<div class="<?php echo $classes; $classes = ''; ?>" id="tab-<?php echo $b++; ?>" <?php echo $shhi; ?>><?php
					if(get_sub_field('list')){
						the_sub_field('list');
					} else {
						the_sub_field('content');
					} ?>
				</div><?php
			endwhile; ?>
		</div>

	</wrap>
</div>


<script>
	$(document).ready(function() {
		$(".tabs a").click(function(event) {
			event.preventDefault();

			$(this).parent().addClass("current");
			$(this).parent().siblings().removeClass("current");
			var tab = $(this).attr("href");
			console.log(tab);
			$(".tContent div").not(tab).css("display", "none");
			$(tab).fadeIn();
		});
	});
</script>
