<?php

// HOME
	if(is_front_page()) {

		// If Override
		if(get_field('on_bc', 'option')){ ?>
			<span class="text">
				<?php the_field('override_bc', 'option') ?>
			</div><?php


// ELSE Mostrar Horarios
		} else {

			$dia = date_i18n('l');
			$hora = date_i18n('H:i');
			$tarde = array('Martes', 'Domingo');
			$tempra = array('Miercoles', 'Miércoles', 'Jueves', 'Viernes', 'Sabado');

			// Debugging
			// $dia = 'Miercoles';
			// echo '<span style="color:red;">'.$dia.' - '.$hora.'</span> :: ';

			if (in_array($dia, $tarde) and ($hora >= '20:00')) {
				if($dia == 'Domingo') {
					echo '<div class="text">Visítanos el martes de 10:00 — 20:00 hrs.</div><div class="mobile">Visitanos el Martes</div>';
				} else {
					echo '<div class="text">Visítanos mañana de 10:00 — 18:00 hrs.</div><div class="mobile">Visitanos Mañana</div>';
				}
			} elseif (in_array($dia, $tempra) and ($hora >= '18:00')) {
				if($dia == 'Sabado') {
					echo '<div class="text">Visítanos mañana de 10:00 — 20:00 hrs.</div><div class="mobile">Visitanos Mañana</div>';
				} else {
					echo '<div class="text">Visítanos mañana de 10:00 — 18:00 hrs.</div><div class="mobile">Visitanos Mañana</div>';
				}
			} elseif ($dia == 'Lunes') {
				echo '<div class="text">Visítanos mañana de 10:00 — 20:00 hrs.</div><div class="mobile">Visitanos Mañana</div>';
			} else {
				if(in_array($dia, $tarde)) {
					echo '<div class="text">Visítanos hoy de 10:00 — 20:00 hrs.</div><div class="mobile">¡Estamos abiertos!</div>';
				} else {
					echo '<div class="text">Visítanos hoy de 10:00 — 18:00 hrs.</div><div class="mobile">¡Estamos abiertos!</div>';
				}
			}

		}

// 404
	} elseif(is_404()) { ?>

		404: Lo que buscas no existe. <span class="text">
		<a href="<?php echo home_url(); ?>" title="3 Museos">Volver a Inicio</a><?php




// Breadcrumbs
	} else {
		echo 'Estas en:&nbsp; ';

	// Single Exposiciones
		if(is_singular('post')) : ?>

			<a href="<?php echo home_url('/exposiciones'); ?>" title="3 Museos">Exposiciones</a> &nbsp;&rsaquo;&nbsp;
			<?php if(get_field('expo_status') == 'Permanente') { ?>
				<a href="<?php echo home_url('/exposiciones'); ?>" title="Exposiciones Actuales">Permanentes</a> &nbsp;&rsaquo;&nbsp;
			<?php } else { ?>
				<a href="<?php echo home_url('/exposiciones/exposiciones-temporales'); ?>" title="Exposiciones Temporales">Temporales</a> &nbsp;&rsaquo;&nbsp;
			<?php } ?><span class="text">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><?php


	// Single Videos
		elseif(is_singular('videos')) : ?>

			<a href="<?php echo home_url('/recursos'); ?>" title="Recursos">Recursos</a> &nbsp;&rsaquo;&nbsp;
			<a href="<?php echo home_url('/recursos/videos'); ?>" title="Videos">Videos</a> &nbsp;&rsaquo;&nbsp;
			<span class="text">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><?php


	// Single Piezas
		elseif(is_singular('pieza')) :

			$cTerm = get_the_terms($post->ID, 'coleccion');
			$termLink = get_term_link($cTerm[0]->name, 'coleccion');

		// get parent term
			$parent = get_term_by( 'id', $cTerm[0]->parent, 'coleccion' );
			$parentLink = get_term_link($parent->name, 'coleccion'); ?>

			<a href="<?php echo esc_url(home_url('/coleccion/mexico-antiguo/')); ?>">Colecciones</a> &nbsp;&rsaquo;&nbsp;<?php

		// Has Parent
			if($parent) { ?>
				<a href="<?php echo esc_url( $parentLink ); ?>"><?php echo $parent->name; ?></a> &nbsp;&rsaquo;&nbsp;
				<a href="<?php echo esc_url( $termLink ); ?>"><?php echo $cTerm[0]->name; ?></a> &nbsp;&rsaquo;&nbsp;<?php

		// Is Parent
			} else { ?>
				<a href="<?php echo esc_url( $termLink ); ?>"><?php echo $cTerm[0]->name; ?></a> &nbsp;&rsaquo;&nbsp;<?php
			} ?>

			<span class="text">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><?php


	// Single Noticias / Eventos
		elseif(is_singular('noticias') or is_singular('eventos')) :
			$pType = get_post_type(get_the_ID());
			$obj = get_post_type_object($pType); ?>

			<a href="<?php echo get_post_type_archive_link( $pType ); ?>"><?php echo $obj->labels->singular_name; ?></a> &nbsp;&rsaquo;&nbsp;<span class="text">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><?php


	// Pages
		elseif(is_page()) :
			// echo wp_get_post_parent_id(get_the_ID());

			if(wp_get_post_parent_id(get_the_ID())) {
			$pID = wp_get_post_parent_id(get_the_ID());  ?>

			<a href="<?php echo get_the_permalink($pID); ?>" title="-"><?php echo get_the_title( $pID ); ?></a> &nbsp;&rsaquo;&nbsp; <span class="text">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><?php


	// Is Parent
			} else { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><span class="text"><?php
			}


	// Taxonomy Archive
		elseif(is_archive() && is_tax()):

			global $wp_query;
			$cTerm = $wp_query->get_queried_object();
			$termLink = get_term_link($cTerm->name, 'coleccion');

		// get parent term
			$parent = get_term_by( 'id', $cTerm->parent, 'coleccion' );
			$parentLink = get_term_link($parent->name, 'coleccion'); ?>

			<a href="<?php echo esc_url(home_url('/coleccion/mexico-antiguo/')); ?>">Colecciones</a> &nbsp;&rsaquo;&nbsp;<?php

		// Has Parent
			if($parent) { ?>
				<a href="<?php echo esc_url( $parentLink ); ?>"><?php echo $parent->name; ?></a> &nbsp;&rsaquo;&nbsp;
				<a href="<?php echo esc_url( $termLink ); ?>"><?php echo $cTerm->name; ?></a><?php

		// Is Parent
			} else { ?>
				<a href="<?php echo esc_url( $termLink ); ?>"><?php echo $cTerm->name; ?></a><?php
			}


	// Archive
		elseif(is_archive()) :

			$obj = get_post_type_object(get_post_type()); ?>
			<a href="<?php get_post_type_archive_link( get_post_type() ); ?>"><?php echo $obj->labels->name; ?></a><span class="text"><?php


	// Search
		elseif(is_search()) : ?>

			Busqueda. <span class="text">
			<a href="<?php echo home_url(); ?>" title="3 Museos">Volver a Inicio</a><?php


	//  Anything else
		else : /*?>

			<a href="<?php echo home_url(); ?>" title="3 Museos">Inicio</a> <?php if(get_title()) { ?> &nbsp;&rsaquo;&nbsp;
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><?php }

*/
		endif;
		echo '</span>';
	} ?>
