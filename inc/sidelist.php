<?php 

	$args = array(
		'post_type' => get_post_type(),
		'post_parent' => $post->ID
	);
	$loop = new WP_Query( $args ); 

	if ($loop->have_posts()) { 				// Tiene hijos

		echo '<ul><li><a href="'. get_the_permalink() .' " class="current">'. get_the_title() .'</a></li>';
		while ($loop->have_posts()) : $loop->the_post(); 
			echo '<li><a href="'. get_the_permalink() .' ">'. get_the_title() .'</a></li>';
		endwhile;
		echo '</ul>';
		wp_reset_query();




	} else if (wp_get_post_parent_id( $post->ID )) {	// Es un hijo

		$dadID = wp_get_post_parent_id( $post->ID );
		$curID = get_the_ID();
		echo '<ul><li><a href="'.get_the_permalink($dadID).'">'.get_the_title($dadID).'</a></li>';

		$psArgs = array(
			'post_type' => get_post_type(),
			'post_parent' => $dadID
		);
		$psLoop = new WP_Query( $psArgs ); 

		while ($psLoop->have_posts()) : $psLoop->the_post(); 
			$thisID = get_the_ID();			
			echo '<li><a href="'. get_the_permalink() .'" ';
				if ($curID == $thisID) { 
					echo 'class="current"'; 
				} 
			echo '>'. get_the_title() .'</a></li>';
		endwhile;
		echo '</ul>';
		wp_reset_query();




	} else {		// No tiene familia
		echo '<a onclick="history.go(-1);">REGRESAR</a>';
	} ?>