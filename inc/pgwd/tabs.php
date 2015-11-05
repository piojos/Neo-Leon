<div class="menu">
	<wrap style="background-image: url(<?php
		$bgImg = get_sub_field('bg-img');
		$bgImgUrl = wp_get_attachment_image_src( $bgImg, 'larger' );
		echo $bgImgUrl[0]; ?>)"><?php

		if(get_sub_field('title')){
			echo '<h1>'.get_sub_field('title').'</h1>';
		} ?>
		<ul class="tabs FU_B"><?php
			$a = 1;
			while ( have_rows('groups') ) : the_row();
				echo '<li';
				if($a == 1){
					echo ' class="current"';
				}
				echo '><a href="#tab-'.$a++.'">'.get_sub_field('title').'</a></li>';
			endwhile; ?>
		</ul>

		<ul class="content"><?php
			$b = 1;
			while ( have_rows('groups') ) : the_row(); ?>
				<li class="<?php
				if (get_sub_field('2_cols')) {
					echo 'cols_2 ';
				}
				if($b == 1){
					echo 'current';
				} ?>" id="tab-<?php echo $b++; ?>" >
					<?php the_sub_field('list'); ?>
				</li><?php
			endwhile; ?>
		</ul>

	</wrap>
</div>


<script>
	$(document).ready(function() {
		$(".tabs a").click(function(event) {
			event.preventDefault();
			$(this).parent().addClass("current");
			$(this).parent().siblings().removeClass("current");
			var tab = $(this).attr("href");
			$(".content li").not(tab).css("display", "none");
			$(tab).fadeIn();
		});
	});
</script>
