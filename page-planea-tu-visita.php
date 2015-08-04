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

		<div class="events">
			<wrap>
				<div class="line">
					<div>
						<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
					</div>
					<div></div>
				</div>
				
				<div class="title">
					<p>3 Horas</p>
					<h2>Llega a 3 Museos</h2>
					<?php echo get_template_part('inc/mini', 'slider');?>
				</div>
			</wrap>
		</div>

		<div class="commute">
			<wrap>
				<div class="line">
					<div>
						<img src="<?php bloginfo('template_url'); ?>/img/commute.svg">
					</div>
					<div></div>
				</div>
				
				<div class="title">
					<p>Trayecto</p>
					<h2>Cambiar de museo</h2>
				</div>

				<div class="icon">
					<img src="<?php bloginfo('template_url'); ?>/img/walking.svg">
					<p>5 min</p>
				</div>
			</wrap>
		</div>

		<div class="events small">
			<wrap>
				<div class="line">
					<div>
						<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
					</div>
					<div></div>
				</div>
				
				<div class="title">
					<p>1 Hora</p>
					<h2>Llega a 3 Museos</h2>
					<?php echo get_template_part('inc/mini', 'slider'); ?>
				</div>
			</wrap>
		</div>

		<div class="commute">
			<wrap>
				<div class="line">
					<div>
						<img src="<?php bloginfo('template_url'); ?>/img/commute.svg">
					</div>
					<div></div>
				</div>
				
				<div class="title">
					<p>Trayecto </p>
					<h2>Caminar por la explanada</h2>
				</div>

				<div class="icon">
					<img src="<?php bloginfo('template_url'); ?>/img/walking.svg">
					<p>5 min</p>
				</div>
			</wrap>
		</div>

		<div class="events small">
			<wrap>
				<div class="line">
					<div>
						<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
					</div>
					<div></div>
				</div>
				
				<div class="title">
					<p>3 Horas</p>
					<h2>Llega a 3 Museos</h2>
					<?php echo get_template_part('inc/mini', 'slider'); ?>
				</div>
			</wrap>
		</div>

	</div>


<?php get_footer(); ?>
