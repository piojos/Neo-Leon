<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title(''); ?></title>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/extra.css">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="<?php bloginfo('template_url');?>/js/masonry.pkgd.min.js"></script>
	<script src="<?php bloginfo('template_url');?>/js/imagesloaded.pkgd.js"></script>
	<script src="<?php bloginfo('template_url');?>/js/responsiveslides.min.js"></script>
	<script src="<?php bloginfo('template_url');?>/js/jquery.simpleWeather.min.js"></script>
	<script src="<?php bloginfo('template_url');?>/js/mediaelement-and-player.min.js"></script>
	<script src="<?php bloginfo('template_url');?>/js/mep-feature-playlist.js"></script>
	<?php if( (get_post_type(get_the_ID()) == "post") or (get_post_type(get_the_ID()) == "videos") ) { ?>
			<script src="<?php bloginfo('template_url'); ?>/js/clamp.min.js"></script>
			<script src="<?php bloginfo('template_url'); ?>/js/jquery.fitvids.js"></script>
	<?php } ?>
	<script src='<?php bloginfo('template_url');?>/js/jquery.zoom.min.js'></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
	$(function() {
		$( "form #date" ).datepicker({
				dateFormat: "d M yy",
				altFormat : "yymmdd",
				altField : 'form #dateFormat:hidden'

			});

		$(".slider .rslides").responsiveSlides({
			auto: true,
			pager: false,
			nav: true,
			speed: 500,
		});

		$("#video-slider.rslides").responsiveSlides({
			auto: false,
			pager: false,
			nav: true,
		});
	});

	</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class($bClass); ?>>

	<header>
		<wrap>
			<div class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">3 Museos</a>
				<a class="site-map-button"><img src="<?php bloginfo('template_url');?>/img/sm-arr-b.svg"></a>
			</div>
			<div class="search-box">

				<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" value="" name="s" id="s" placeholder="¿Qué estás buscando?">
					<input type="submit" id="searchsubmit" value="0-">
					<a href="#" class="close-search"><img src="<?php bloginfo('template_url');?>/img/close.svg"></a>
				</form>

			</div>


<?php
		if( have_rows('h_menu', 'option') ) :
			echo '<nav><ul class="menu">';
			while( have_rows('h_menu', 'option') ): the_row(); ?>

				<li>
					<a href="<?php if( in_array( 'Enlace Externo', get_sub_field('opts')) ){ echo 'http://'.get_sub_field('out_link'); } else { the_sub_field('in_link'); } ?>">
						<?php the_sub_field('name'); ?>
					</a>
				</li>

<?php 		endwhile;
			echo '</ul></nav>';
		endif;  ?>


			<div class="search-temp">
				<a href="#" class="search-btn"><img src="<?php bloginfo('template_url');?>/img/search.svg"></a>

			<?php if(get_field('on_w', 'option')){ ?>
				<div id="temp-hold"></div>
			<?php } ?>
			</div>
		</wrap><!-- wrap -->
	</header>
	<div class="breadcrumbs">
		<wrap>

			<?php echo get_template_part('inc/breadcrumbs'); ?>

			<?php if(get_field('on_t', 'option')){ ?>
				<a href="http://<?php the_field('tickets', 'option') ?>" class="buy-tickets"><span>Compra tus </span>Boletos</a>
			<?php } ?>

		</wrap>
	</div>

	<?php echo get_template_part('inc/aside'); ?>