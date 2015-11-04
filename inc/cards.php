<?php

	$image = get_post_thumbnail_id( $post_id );
	$img_med = wp_get_attachment_image_src($image, 'medium');
	$img_card = wp_get_attachment_image_src($image, 'cardSize');
	$img_large = wp_get_attachment_image_src($image, 'large'); ?>


<li <?php if(get_field('wider')){echo 'class="w2"';}?> >
	<a href="<?php the_permalink(); ?>" <?php if(is_singular('post')){ echo 'target="_blank"'; }?>><?php

	// Imagen adentro
	if(($post->post_type == 'pieza') ){

		echo '<div class="description pieza">';
		if($img_med) { ?>
			<div class="feature-img">
				<img src="<?php if(get_field('wider')){ echo $img_large[0]; } else { echo $img_med[0]; } ?>" atl="3 museos">
			</div>
		<?php }


	// Imagen afuera
	} else {

		if($img_med) { ?>
			<div class="feature-img">
				<div class="tag">
					<?php echo get_template_part('funct/tag'); ?>
				</div>
				<img src="<?php if(get_field('wider')){ echo $img_large[0]; } else { echo $img_card[0]; } ?>" atl="3 museos"><?php

				if( in_array( 'update', get_field('options') ) AND in_array( 'live', get_field('options') ) ) {
					echo '<div class="warn FU_B"><img src="'. get_bloginfo("template_url") .'/img/ev-change.svg"> <img src="'. get_bloginfo("template_url") .'/img/ev-live.svg"> Transmisión en vivo</div> ';
					$status = "warned";
				} elseif( in_array( 'cancel', get_field('options') ) ) {
					echo '<div class="warn FU_B red"><img src="'. get_bloginfo("template_url") .'/img/ev-cancel.svg"> Cancelado</div> ';
					$status = "warned";
				} elseif( in_array( 'update', get_field('options') ) ) {
					echo '<div class="warn FU_B"><img src="'. get_bloginfo("template_url") .'/img/ev-change.svg"> Actualizado</div> ';
					$status = "warned";
				} elseif( in_array( 'live', get_field('options') ) ) {
					echo '<div class="warn FU_B orange"><img src="'. get_bloginfo("template_url") .'/img/ev-live.svg"> Transmisión en vivo</div> ';
					$status = "warned";
				} ?>

			</div><?php
		} ?>

		<div class="description <?php echo $status; $status = ''; ?>"><?php

		// Si no tenía imagen
		if(!$img_med) { ?>
			<div class="tag">
				<?php echo get_template_part('funct/tag'); ?>
			</div><?php
		}
	}


	// No mostrar fecha.
	if(($post->post_type == 'eventos') or
		($post->post_type == 'pieza') or
		($post->post_type == 'page') or
		($post->post_type == 'videos') or
		($post->post_type == 'post')) {}
	else {
		echo '<div class="date">'.get_the_time('F j, Y').'</div>';
	}


	// Si estas en search results,
	if(($post->post_type == 'pieza') and is_search()
		or is_singular( 'pieza' )) {

		$cTerm = get_the_terms($post->ID, 'coleccion');		// Colección a la que pertenece
		echo '<p>Colección: '.$cTerm[0]->name.'</p>';
	}


	// Título ?>
	<h1><?php the_title(); ?></h1><?php


	// Descripción
	if( ($post->post_type == 'page') and get_field('kicker') or
		($post->post_type == 'noticias') and get_field('kicker')) {

		echo '<p>';
		echo get_field('kicker').'</p>';
	}


	if(($post->post_type == 'eventos')
		or is_singular( 'eventos' )) { 							// Single de Evento (Mas Eventos)
		echo '<p>';
		echo get_template_part('funct/eventdate').'</p>';		// Mostrar detalles de fechas


	} elseif(is_post_type_archive( 'eventos' )) {
		echo '<p>';												// Mostrar horas de hoy si hoy es
		while ( have_rows('days') ) : the_row();				// (página de eventos)
			$eventDay = get_sub_field('date');
			$today = current_time('Ymd');
			$numb = get_sub_field('hours');
			$number = count($numb);

			if($eventDay == $today) {
				if( have_rows('hours') ) {
					$count = 0;
					while( have_rows('hours') ) { the_row();
						$count++;
						if($count >= 2) {
							if ($count == $number){ echo ' y ';}
							else { echo ', '; }
						}
						the_sub_field('time');
					}
					echo ' horas. ';
				} else {
					echo 'Todo el día.';
				}
			}
		endwhile;
		echo '</p>';

	}


	if(get_field('expo_status') == 'Permanente') { 			// Exposición Permanente

		echo '<p>'.get_field('schedule').'</p>';


	} elseif(get_field('expo_status') == 'Temporal') { 		// Exposición Temporal

		if(get_field('museum')){
			echo '<p>'.get_field('museum');
		} if(get_field('end_time')) {
			$endDate = strtotime(get_sub_field('end_time'));
			echo '<br>Hasta el '.date_i18n('j', $endDate).' de '.date_i18n('F', $endDate).'.</p>';
		} else {
			echo '</p>';
		}

	} ?>
		</div>
	</a>
</li>
