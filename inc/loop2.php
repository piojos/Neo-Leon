<?php

// First(Empty) Query ( .../eventos )
	if(htmlentities($_GET['date']) == "") { 
		$_GET['evType'] = '';
		$_GET['museum'] = '1';
		$_GET['date'] = date('d M Y');
		$_GET['dateFormat'] = date('Ymd');
	}

	function my_posts_where( $where ) {
		$where = str_replace("meta_key = 'days_%_date", "meta_key LIKE 'days_%_date", $where);
		$where = str_replace("meta_key = 'dates_%_start-day", "meta_key LIKE 'dates_%_start-day", $where);
		$where = str_replace("meta_key = 'dates_%_end-day", "meta_key LIKE 'dates_%_end-day", $where);
		return $where;
	}
	add_filter('posts_where', 'my_posts_where');

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
