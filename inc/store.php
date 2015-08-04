<div class="store-rent">
	<div class="store">
		<img src="<?php the_field('product-img'); ?>" alt="tutankamón" class="piece">
		<div>
			<span>Nuevo en la tienda</span>
			<h2>Colección Tutankamón</h2>
			<h1>Escultura de gato egipcio</h1>
			<a href="http://<?php the_field('product-link'); ?>" class="button">Ver en tienda</a>
		</div>
	</div>
	<div class="store amigo">
		<img src="<?php the_field('pase-img'); ?>" alt="tutankamón" class="piece">
		<div>
			<span>Conviértete en</span>
			<h2>AMIGO DE LA HISTORIA</h2>
			<h1>Obtén tu membresía</h1>
			<a href="<?php the_field('pase-link'); ?>" class="button">Quiero ser amigo</a>
		</div>
	</div>
	<div class="rent">
		<div>
			<h2>Reserva</h2>
			<h1>Tu evento en 3 Museos</h1>
			<a href="<?php the_field('rsvp-link'); ?>" class="button">Conoce más</a>
		</div>
		<img src="<?php the_field('rsvp-img'); ?>" alt="" class="decor">
	</div>
</div>