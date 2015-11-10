
<?php 	// echo get_template_part('inc/heading');
		echo get_template_part('inc/slider'); ?>



<?php
	$check = count(get_field('sala'));
	if( have_rows('sala') ):
		echo '<ul class="rooms expo">';
		$nA = 0;


	    while ( have_rows('sala') ) : the_row();
	    	$nA++;
	    	$nAp = sprintf("%02d", $nA); ?>

		<li class="<?php
			// if($nA == 1){ // only first & add jquery
			// 	echo 'open ';
			// }
			if ($check == 1) {
			 	echo ' unique open';
			} ?>">
			<section class="head">
				<wrap>
					<div><?php echo $nAp; ?></div>
					<div>
						<p><?php
						if(get_sub_field('space')){
							the_sub_field('space');
						} else {
							the_field('museum');
						} ?></p>
						<h2><?php the_sub_field('title'); ?></h2>
					</div>
					<div>
						<?php echo '<p>'.get_sub_field('description').'</p>'; ?>
					</div>
					<div>
						<a class="open_btn">
							<div></div>
						</a>
					</div>
				</wrap>
			</section>

			<article>
				<?php echo get_template_part('inc/exp-article'); ?>
			</article>
		</li>

<?php
	    endwhile;
	    echo '</ul>';
	endif;
?>



<?php
	if( have_rows('audio-player') ):

		echo '<div id="audio-player"><audio controls="controls" autoplay="autoplay">';
		while ( have_rows('audio-player') ) : the_row();

			$attachment_id = get_sub_field('file');
			$url = wp_get_attachment_url( $attachment_id );
			$title = get_the_title( $attachment_id );

			if( $attachment_id ):
			    ?><source src="<?php echo $url; ?>" title="<?php echo $title; ?>" type="audio/mp3"/><?php
			endif;

		endwhile;
		echo '</audio></div></body></html>';

		wp_footer();
	else :
		get_footer();
	endif; ?>


<script>
	$(document).ready(function() {
		$('#audio-player audio').mediaelementplayer({
			loop: false,
			shuffle: false,
			playlist: true,
			audioWidth: '100%',
			autoPlay: false,
			playlistposition: 'bottom',
			features: ['playlistfeature', 'playpause', 'prevtrack', 'nexttrack', 'playlist', 'current', 'progress', 'duration'],
			success: function (mediaElement, domObject) {
				mediaElement.pause();
			},
			keyActions: []
		});

		$('.video video').mediaelementplayer({
			features: ['playpause', 'current', 'progress', 'duration'],
		});
		var y = $("#audio-player .mejs-playlist ul li").outerWidth()+13;
		// $('#audio-player .mejs-playlist ul').width($(".mejs-playlist ul li").length * y);
		$('li.played.current').clone().prependTo('.mejs-duration-container');

		$('#audio-player .mejs-container, .mejs-offscreen').addClass('show-playlist');
		$( "#audio-player .mejs-playlist-button button" ).click(function() {
			$('#audio-player .mejs-container, .mejs-offscreen').toggleClass('hide-playlist show-playlist');
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

		$('.rooms section.head wrap > div:nth-child(3) p').each(function(index, element) {
			$clamp(element, { clamp: 2, useNativeClamp: true });
		});


		$(".video-container").fitVids();

		$( 'ul#video-slider li.slide' ).each(function() {
			var x = $('.video-container, iframe', this).outerHeight();
			$(this).css('height', x);
		});

		$(window).resize(function() {
			$('.mejs-playlist ul').width($(".mejs-playlist ul li").length * y);

			$( 'ul#video-slider li.slide' ).each(function() {
				var x = $('.video-container, iframe', this).outerHeight();
				$(this).css('height', x);
			});
		});



		// Toggle Rooms
		$( 'ul.rooms li section.head' ).click(function() {
			$( 'ul.rooms li' ).removeClass( "open" );
			$( 'ul.rooms li' ).addClass( "closed" );
			$( this ).parents('li').toggleClass( "open closed" );
			var that = this;
			setTimeout(function(){
				$(that).parents('li').css('height', 'inherit');
				var parentHeight = $(that).parent('li').height();
				$(that).parents('li').height(parentHeight);
				var thaTop = $(that).parents('li').offset().top;
				$('html,body').animate({
					scrollTop: thaTop
				}, 500);
			}, 500);
		});

		// Get height
		$( 'ul.rooms li section.head' ).each(function() {
			var parentHeight = $(this).parent('li').height();
			$(this).parents('li').height(parentHeight);
			$(this).parents('li').addClass('closed');
		});

	});

	// Window resize
	$(window).on('resize', function(){
		$( 'ul.rooms li.open' ).each(function() {
			$(this).css('height', 'inherit');
			var thisH = $(this).height();
			var that = this;
			setTimeout(function(){
				$(that).height(thisH);
			}, 100);
		});
	});

	// $(function() {
	// 	$('a[href*=#]:not([href=#])').click(function() {
	// 		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	// 			var target = $(this.hash);
	// 			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	// 			if (target.length) {
	// 				$('html,body').animate({
	// 					scrollTop: target.offset().top
	// 				}, 1000);
	// 				return false;
	// 			}
	// 		}
	// 	});
	// });

	var $container = $('.masonry');
	$container.imagesLoaded( function() {
	  $container.masonry({
			itemSelector: 'li',
			percentPosition: true
		});
	});
</script>
