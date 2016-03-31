<?php
	global $nl;
	if($nl) {
		$nlM = ' class="newsletter"';
	} ?>

	<footer<?php echo $nlM; ?>>
		<wrap><?php
			if($nl) {
				get_template_part('inc/newsletter');
			}


			if( have_rows('f_menu', 'option') ) :
				echo '<ul class="menu">';
				while( have_rows('f_menu', 'option') ): the_row(); ?>

					<li>
						<a href="<?php if( get_sub_field('opts') ){ echo 'http://'.get_sub_field('out_link'); } else { the_sub_field('in_link'); } ?>">
							<?php the_sub_field('name'); ?>
						</a>
					</li><?php

				endwhile;
				echo '</ul>';
			endif;  ?>


			<ul class="mobile">
				<a href="<?php echo esc_url(home_url('/contacto/')); ?>" class="switch">Contacto</a><?php
				while ( have_rows('redes', 'option') ) : the_row();

					if(get_sub_field('channel') == 'otro') {
						echo '<style> footer .share.otro:hover { background-image: url('.get_sub_field('ic_color').') !important; } </style>';
					}

					echo '<a href="';
					if(get_sub_field('channel') == 'otro') {
						echo get_sub_field('url').'" style="background-image: url('.get_sub_field('ic_gray').');';
					} elseif(get_sub_field('channel') == 'tumblr') {
						echo 'http://'.get_sub_field('usuario').'.tumblr.com/';
					} else {
						echo 'http://www.'.get_sub_field('channel').'.com/'.get_sub_field('usuario');
					}

					echo '" class="share '.get_sub_field('channel').'"></a>';

				endwhile; ?>
			</ul>
			<div class="copyright">
				<p><?php the_field('f_address', 'option')?>. Todos los derechos reservados 3 Museos &copy; <?php echo current_time('Y'); ?></p>
				<p><a href="http://nl.gob.mx/transparencia">Transparencia</a> |
				<a href="<?php echo esc_url( home_url( '/privacidad' ) ); ?>">Privacidad</a></p>
			</div>
		</wrap>
	</footer>

	<div class="post-footer">
		<wrap>
			<div class="associates">
				<h2 class="FU_B"><?php the_field('f_quote', 'option'); ?></h2><?php

				while( have_rows('logos', 'option') ): the_row();
					$logo = get_sub_field('logo');
					$get = wp_get_attachment_image_src( $logo, 'medium' ); ?>

					<a href="http://<?php the_sub_field('link'); ?>">
						<img src="<?php echo $get[0]; ?>">
					</a><?php

				endwhile; ?>

			</div>
			<div class="certificates"><?php

				while( have_rows('certs', 'option') ): the_row();
					$cert = get_sub_field('logo');
					$get = wp_get_attachment_image_src( $cert, 'medium' ); ?>

					<a href="http://<?php the_sub_field('link'); ?>">
						<img src="<?php echo $get[0]; ?>">
					</a><?php

				endwhile; ?>

				<p class="iso FU">CERTIFICADO BAJO LA NORMA ISO 9001:2008</p>
			</div>
		</wrap>
	</div>

</body>
</html>
<?php wp_footer(); ?>
<script>
	var $container = $('.masonry');
	$container.imagesLoaded( function() {
		$container.masonry({
			itemSelector: 'li',
			percentPosition: true
		});
	});
	$( "a.search-btn, a.close-search" ).click(function() {
		$( "header" ).toggleClass( "show-search" );
	});

	$(document).ready(function() {
		$.simpleWeather({
			location: 'Monterrey, MX',
			woeid: '',
			unit: 'c',
			success: function(weather) {
				html = '<i class="icon-'+weather.code+'"></i>';
				html += '<ul><li>+ &nbsp;'+weather.high+'</li>';
				html += '<li>– &nbsp;'+weather.low+'</li></ul>';
				$("#temp-hold").html(html);
			},
			error: function(error) {
				$("#temp-hold").html('<p>'+error+'</p>');
			}
		});
	});
</script>
