<?php

	// Planea tu visita Template

	get_header(); ?>

	<?php echo get_template_part('inc/search', 'box'); ?>


<div class="plan">
	<div class="commute first">
		<wrap>
			<div class="line">
				<div>
					<img src="<?php bloginfo('template_url'); ?>/img/marker.svg">
				</div>
				<div></div>
			</div>

			<div class="title">
				<p>Trayecto Inicial</p>
				<h2>Llegar a 3 Museos</h2>
			</div>

			<div class="buttons">
				<a href="#" id="open-map">
					<img src="<?php bloginfo('template_url'); ?>/img/transporte.svg">
					<p><span>Consulta</span> Mapa</p>
				</a>
				<a href="http://<?php the_field('tickets', 'option') ?>">
					<img src="<?php bloginfo('template_url'); ?>/img/ticket.svg">
					<p><span>Compra</span> Boletos</p>
				</a>
			</div>
		</wrap>
	</div>

	<div class="show-maps animate">
		<div class="tabs">
			<ul class="wrap">
				<li><a href="#" id="tab1">
					<img src="<?php the_field('auto-icon'); ?>"/>
					Automóvil
				</a></li>
				<li><a href="#" id="tab2">
					<img src="<?php the_field('publ-icon'); ?>"/>
					Transporte Público
				</a></li>
				<li><a href="#" id="tab3">
					<img src="<?php the_field('hand-icon'); ?>"/>
					Acceso
				</a></li>
			</ul>
		</div>

		<div class="map-slider">
			<div class="slide" id="tab1C">
				<div class="info">
					<?php the_field('auto-details');?>
				</div>
				<div class="map"><?php
					if( have_rows('auto-map-pins') ): ?>
						<div class="acf-map"><?php
							while ( have_rows('auto-map-pins') ) : the_row();
							$location = get_sub_field('location'); ?>

								<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
									<h4><?php the_sub_field('title'); ?></h4>
									<p class="address"><?php echo $location['address']; ?></p>
								</div><?php

							endwhile; ?>
						</div><?php
					endif; ?>
				</div>
			</div>

			<div class="slide" id="tab2C">
				<div class="info">
					<?php the_field('publ-details');?>
				</div>
				<div class="map"><?php
					if( have_rows('publ-map-pins') ): ?>
						<div class="acf-map"><?php
							while ( have_rows('publ-map-pins') ) : the_row();
							$location = get_sub_field('location'); ?>

								<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
									<h4><?php the_sub_field('title'); ?></h4>
									<p class="address"><?php echo $location['address']; ?></p>
								</div><?php

							endwhile; ?>
						</div><?php
					endif; ?>
				</div>
			</div>

			<div class="slide" id="tab3C">
				<div class="info">
					<?php the_field('hand-details');?>
				</div>
				<div class="map"><?php
					if( have_rows('hand-map-pins') ): ?>
						<div class="acf-map"><?php
							while ( have_rows('hand-map-pins') ) : the_row();
							$location = get_sub_field('location'); ?>

								<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
									<h4><?php the_sub_field('title'); ?></h4>
									<p class="address"><?php echo $location['address']; ?></p>
								</div><?php

							endwhile; ?>
						</div><?php
					endif; ?>
				</div>
			</div>

		</div>

	</div>

	<?php echo get_template_part('inc/plan', 'engine');?>
</div>



<style type="text/css">

.acf-map {
	width: 100%;
	height: 30em;
}

</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
(function($) {

	function new_map( $el ) {
		var $markers = $el.find('.marker');
		var args = {
			zoom		: 16,
			center		: new google.maps.LatLng(0, 0),
			mapTypeId	: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			styles: [{"featureType":"road","stylers":[{"hue":"#5e00ff"},{"saturation":-79}]},{"featureType":"poi","stylers":[{"saturation":-78},{"hue":"#6600ff"},{"lightness":-47},{"visibility":"off"}]},{"featureType":"road.local","stylers":[{"lightness":22}]},{"featureType":"landscape","stylers":[{"hue":"#6600ff"},{"saturation":-11}]},{},{},{"featureType":"water","stylers":[{"saturation":-65},{"hue":"#1900ff"},{"lightness":8}]},{"featureType":"road.local","stylers":[{"weight":1.3},{"lightness":30}]},{"featureType":"transit","stylers":[{"visibility":"simplified"},{"hue":"#5e00ff"},{"saturation":-16}]},{"featureType":"transit.line","stylers":[{"saturation":-72}]},{}]
		};
		var map = new google.maps.Map( $el[0], args);
		map.markers = [];
		$markers.each(function(){
	    	add_marker( $(this), map );
		});
		center_map( map );
		return map;
	}

	function add_marker( $marker, map ) {
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map
		});
		map.markers.push( marker );
		if( $marker.html() )
		{
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open( map, marker );
			});
		}
	}

	function center_map( map ) {
		var bounds = new google.maps.LatLngBounds();
		$.each( map.markers, function( i, marker ){
			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
			bounds.extend( latlng );
		});
		if( map.markers.length == 1 ) {
		    map.setCenter( bounds.getCenter() );
		    map.setZoom( 16 );
		} else {
			map.fitBounds( bounds );
		}
	}

	var map = null;
	$(document).ready(function(){
		$('.acf-map').each(function(){
			map = new_map( $(this) );
		});
	});

})(jQuery);


	$(document).ready(function() {
		$('.show-maps .tabs li a:not(:first)').addClass('inactive');
		$('.map-slider .slide').hide();
		$('.map-slider .slide:first').show();
		$('.show-maps .tabs li a').click(function(){
    		event.preventDefault();
			var t = $(this).attr('id');

			if($(this).hasClass('inactive')){ //this is the start of our condition
				$('.show-maps .tabs li a').addClass('inactive');
				$('#'+t).removeClass('inactive');
				$('.map-slider .slide').hide();
				$('#'+ t +'C').fadeIn('slow');
			}
		});
		$('a#open-map').click(function(){
    		event.preventDefault();
			$('.show-maps').toggleClass('open');
		});
	});

</script>

<?php get_footer(); ?>
