<?php

	// First(Empty) Query ( .../eventos )
	if(htmlentities($_GET['date']) == "") {
		$_GET['evType'] = '';
		$_GET['museum'] = '1';
		$_GET['date'] = date('d M Y');
		$_GET['dateFormat'] = date('Ymd');
	}


	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'eventos',
		'meta_query'	=> array(
			'relation'		=> 'AND',
			array(
				'key'		=> 'days_%_date',
				'compare'	=> '=',
				'value'		=> $_GET['dateFormat']
			)
		)
	);
	$the_query = new WP_Query( $args );
	$posts = $the_query->get_posts();

	echo '<ul class="masonry cards">';

		foreach($posts as $post) {
			if($_GET['museum'] == 1){
				echo get_template_part('inc/cards');
			} elseif($post->museum == $_GET['museum']){
				echo get_template_part('inc/cards');
			}
		}

		if($posts){} else {
			global $niceDay;
				echo 'No hay eventos programados';
			if($_GET['museum'] == 1) {} else {
				echo ' en el '.$_GET['museum'];
			}
			echo ' el '.$niceDay;
		}

	echo '</ul>';


	wp_reset_query(); ?>
