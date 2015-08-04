<?php 

if($post->post_type == 'post'){
	echo 'Exposición '.get_field('expo_status'); 
} elseif($post->post_type == 'eventos') {
	$terms = get_the_terms( $post->ID, 'event-type'); 
	$count = count($terms); 

	if ( $count > 0 ) { 
		echo '<span>Evento: </span>';
		foreach ( $terms as $term ) { 
			echo $term->name.' '; 
		} 
	}
} elseif($post->post_type == 'page') {

	$parent = get_post( $post->post_parent );
	if ($parent->post_title == get_the_title()) {
		echo 'Información';
	} else {
		echo $parent->post_title;
	}

} else { 
	echo get_post_type(); 
}

?>