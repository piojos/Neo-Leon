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
				<a href="#">
					<img src="<?php bloginfo('template_url'); ?>/img/transporte.svg">
					<p><span>Consulta</span> Mapa</p>
				</a>
				<a href="#">
					<img src="<?php bloginfo('template_url'); ?>/img/ticket.svg">
					<p><span>Compra</span> Boletos</p>
				</a>
			</div>
		</wrap>
	</div>


	<?php echo get_template_part('inc/mini', 'slider');?>
</div>
<?php get_footer(); ?>
