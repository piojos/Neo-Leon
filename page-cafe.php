<?php 
$bClass = ' cafe ';
get_header(); 

echo get_template_part('inc/slider'); ?>

<div class="rooms expo">
	<article>
		<?php echo get_template_part('inc/exp-article'); ?>
	</article>
</div>


<?php get_footer(); ?>


<script>
	$(document).ready(function() {

		$('.video video').mediaelementplayer({
			features: ['playpause', 'current', 'progress', 'duration'],
		});

		$( 'a.rslides_nav' ).click(function() {
			$('.video video').each(function() { 
				$(this)[0].player.pause(); 
			});
			$("iframe").each(function() { 
				var src= $(this).attr('src');
				$(this).attr('src',src);  
			});
		});

		$(".video-container").fitVids();

	});

</script>