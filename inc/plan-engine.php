<?php

// First(Empty) Query ( .../planea-tu-visita )
	if(htmlentities($_GET['date']) == "") {
		$_GET['audience'] = 'public';
		$_GET['time'] = '120';
		$_GET['date'] = date('d M Y');
		$_GET['dateFormat'] = date('Ymd');
	}


// Vars
	$time = $_GET['time'];
	$audience = $_GET['audience'];
	$date = $_GET['dateFormat'];

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

	$argsExpo = array(
		'numberposts'	=> -1,
		'post_type'		=> 'post',
		'meta_query'	=> array(
			'relation'		=> 'AND',
			array(
				'key'		=> 'expo_status',
				'compare'	=> 'IN',
				'value'		=> array('Temporal','Permanente')
			)
		)
	);
	$the_queryExpo = new WP_Query( $argsExpo );
	$postsExpo = $the_queryExpo->get_posts();

	$slideDOS = array();
	$slideCUATRO = array();
	$slideSEIS = array();
	$museoH = array();
	$museoN = array();
	$museoP = array();

	$dur = 0;
	$exit = true;
	$isExpoAdded = false;
	$isExpoTemAdded = false;
	$duracion120 = 120;







// ***
	foreach($posts as $post) {
		if($post->museum == 'Museo de Historia Mexicana'){
			array_push($museoH,$post);
		}elseif($post->museum == 'Museo del Noreste'){
			array_push($museoN,$post);
		}elseif($post->museum == 'Museo del Palacio'){
			array_push($museoP,$post);
		}
	}

	foreach($postsExpo as $postE) {
		if($postE->museum == 'Museo de Historia Mexicana'){
			array_push($museoH,$postE);
		}elseif($postE->museum == 'Museo del Noreste'){
			array_push($museoN,$postE);
		}elseif($postE->museum == 'Museo del Palacio'){
			array_push($museoP,$postE);
		}
	}





// ***
	if($_GET['dateFormat']!= ''){

// 2 Horas
		if($time == 120){

			shuffle($museoH);

			foreach($museoH as $post) {
				if($post->post_type == 'post' && $post->expo_status == 'Permanente' && $isExpoAdded!=true){
					if($duracion120 - $post->duracion >= 0){
						array_push($slideDOS,$post);
						$duracion120 -= $post->duracion;
						$isExpoAdded=true;
						break;
					}
				}
			}
			foreach($museoH as $post) {
				if($post->post_type == 'post' && $post->expo_status == 'Temporal' && $isExpoTemAdded != true){
					if($duracion120 - $post->duracion >= 0){
						array_push($slideDOS,$post);
						$isExpoTemAdded=true;
						$duracion120 -= $post->duracion;
						break;
					}
				}
			}
			foreach($museoH as $post) {
				if($post->post_type == 'eventos'){
					// if($duracion120 - $post->duracion >= 0){
						array_push($slideDOS,$post);
					// 	$duracion120 -= $post->duracion;
					// }
				}
			}
			if (count($slideDOS)>0 ){ ?>
				<div class="events">
					<wrap>
						<div class="line">
							<div>
								<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
							</div>
							<div></div>
						</div>

						<div class="title">
							<div class="slider">
								<ul class="rslides"><?php
									foreach($slideDOS as $post) {
										echo get_template_part('inc/slide');
									} ?>
								</ul>
							</div>
						</div>
					</wrap>
				</div><?php
			}

			$duracion120 = 120;
			$isExpoAdded = false;
			$isExpoTemAdded = false;

		} // END 2 Horas










// 4 Horas
		elseif($time == 240) {

			shuffle($museoH);

			foreach($museoH as $post) {
				if($post->post_type == 'post' && $post->expo_status == 'Permanente' && $isExpoAdded != true){
					if($duracion120 - $post->duracion >= 0){
						array_push($slideDOS,$post);
						$duracion120 -= $post->duracion;
						$isExpoAdded=true;
						break;
					}
				}
			}
			foreach($museoH as $post) {
				if($post->post_type == 'post' && $post->expo_status == 'Temporal' && $isExpoTemAdded != true){
					if($duracion120 - $post->duracion >= 0){
						array_push($slideDOS,$post);
						$isExpoTemAdded=true;
						$duracion120 -= $post->duracion;
						break;
					}
				}
			}
			foreach($museoH as $post) {
				if($post->post_type == 'eventos'){
					// if($duracion120 - $post->duracion >= 0){
						array_push($slideDOS,$post);
					// 	$duracion120 -= $post->duracion;
					// }
				}
			}
			if (count($slideDOS)>0 ){ ?>
				<div class="events">
					<wrap>
						<div class="line">
							<div>
								<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
							</div>
							<div></div>
						</div>

						<div class="title">
							<div class="slider">
								<ul class="rslides"><?php
									foreach($slideDOS as $post) {
										echo get_template_part('inc/slide');
									} ?>
								</ul>
							</div>
						</div>
					</wrap>
				</div><?php
			}

			$duracion120 = 120;
			$isExpoAdded = false;
			$isExpoTemAdded = false;


			shuffle($museoN);


			foreach($museoN as $postN) {
				if($postN->post_type == 'post' && $postN->expo_status == 'Permanente' && $isExpoAdded!=true){
					if($duracion120 - $postN->duracion >= 0){
						array_push($slideCUATRO,$postN);
						$duracion120 -= $postN->duracion;
						$isExpoAdded=true;
						break;
					}
				}
			}
			foreach($museoN as $postN) {
				if($postN->post_type == 'post' && $postN->expo_status == 'Temporal' && $isExpoTemAdded != true){
					if($duracion120 - $postN->duracion >= 0){
						array_push($slideCUATRO,$postN);
						$isExpoTemAdded=true;
						$duracion120 -= $postN->duracion;
						break;
					}
				}
			}
			foreach($museoN as $postN) {
				if($postN->post_type == 'eventos'){
					// if($duracion120 - $postN->duracion >= 0){
						array_push($slideCUATRO,$postN);
					// 	$duracion120 -= $postN->duracion;
					// }
				}
			}
			if(count($slideCUATRO) > 0 ) {
				echo get_template_part('inc/plan','commute'); ?>

				<div class="events">
					<wrap>
						<div class="line">
							<div>
								<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
							</div>
							<div></div>
						</div>
						<div class="title">
							<div class="slider">
								<ul class="rslides"><?php
									foreach($slideCUATRO as $post) {
										echo get_template_part('inc/slide');
									} ?>
								</ul>
							</div>
						</div>
					</wrap>
				</div><?php
			}

			$duracion120 = 120;
			$isExpoAdded = false;
			$isExpoTemAdded = false;

		} // END 4 Horas










// 6 Horas
		elseif($time == 360) {

			shuffle($museoH);

			foreach($museoH as $post) {
				if($post->post_type == 'post' && $post->expo_status == 'Permanente' && $isExpoAdded!=true){
					if($duracion120 - $post->duracion >= 0){
						array_push($slideDOS,$post);
						$duracion120 -= $post->duracion;
						$isExpoAdded=true;
						break;
					}
				}
			}
			foreach($museoH as $post) {
				if($post->post_type == 'post' && $post->expo_status == 'Temporal' && $isExpoTemAdded != true){
					if($duracion120 - $post->duracion >= 0){
						array_push($slideDOS,$post);
						$isExpoTemAdded=true;
						$duracion120 -= $post->duracion;
						break;
					}
				}
			}
			foreach($museoH as $post) {
				if($post->post_type == 'eventos'){
					// if($duracion120 - $post->duracion >= 0){
						array_push($slideDOS,$post);
					// 	$duracion120 -= $post->duracion;
					// }
				}
			}

			if (count($slideDOS)>0 ){ ?>
				<div class="events">
					<wrap>
						<div class="line">
							<div>
								<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
							</div>
							<div></div>
						</div>
						<div class="title">
							<div class="slider">
								<ul class="rslides"><?php
									foreach($slideDOS as $post) {
									 	echo get_template_part('inc/slide');
									} ?>
								</ul>
							</div>
						</div>
					</wrap>
				</div><?php
			}

			$duracion120 = 120;
			$isExpoAdded=false;
			$isExpoTemAdded=false;


			shuffle($museoN);


			foreach($museoN as $postN) {
				if($postN->post_type == 'post' && $postN->expo_status == 'Permanente' && $isExpoAdded!=true){
					if($duracion120 - $postN->duracion >= 0){
						array_push($slideCUATRO,$postN);
						$duracion120 -= $postN->duracion;
						$isExpoAdded=true;
						break;
					}
				}
			}
			foreach($museoN as $postN) {
				if($postN->post_type == 'post' && $postN->expo_status == 'Temporal' && $isExpoTemAdded != true){
					if($duracion120 - $postN->duracion >= 0){
						array_push($slideCUATRO,$postN);
						$isExpoTemAdded=true;
						$duracion120 -= $postN->duracion;
						break;
					}
				}
			}
			foreach($museoN as $postN) {
				if($postN->post_type == 'eventos'){
					// if($duracion120 - $postN->duracion >= 0){
						array_push($slideCUATRO,$postN);
					// 	$duracion120 -= $postN->duracion;
					// }
				}
			}
			if (count($slideCUATRO) > 0) {
				echo get_template_part('inc/plan','commute'); ?>
				<div class="events">
					<wrap>
						<div class="line">
							<div>
								<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
							</div>
							<div></div>
						</div>

						<div class="title">
					   		<div class="slider">
						   		<ul class="rslides"><?php
							   		foreach($slideCUATRO as $post) {
						   			 	echo get_template_part('inc/slide');
									} ?>
								</ul>
							</div>
						</div>
					</wrap>
				</div><?php
			}

			$duracion120 = 120;
			$isExpoAdded = false;
			$isExpoTemAdded=false;


			shuffle($museoP);


			foreach($museoP as $postP) {
				if($postP->post_type == 'post' && $postP->expo_status == 'Permanente' && $isExpoAdded!=true){
					if($duracion120 - $postP->duracion >= 0){
						array_push($slideSEIS,$postP);
						$duracion120 -= $postP->duracion;
						$isExpoAdded=true;
						break;
					}
				}
			}
			foreach($museoP as $postN) {
				if($postP->post_type == 'post' && $postP->expo_status == 'Temporal' && $isExpoTemAdded != true){
					if($duracion120 - $postP->duracion >= 0){
						array_push($slideSEIS,$postP);
						$isExpoTemAdded=true;
						$duracion120 -= $postP->duracion;
						break;
					}
				}
			}
			foreach($museoP as $postP) {
				if($postP->post_type == 'eventos'){
					// if($duracion120 - $postP->duracion >= 0){
						array_push($slideSEIS,$postP);
					// 	$duracion120 -= $postP->duracion;
					// }
				}
			}
			if(count($museoP)>0 ) {
				echo get_template_part('inc/plan','commute'); ?>
				<div class="events">
					<wrap>
						<div class="line">
							<div>
								<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
							</div>
							<div></div>
						</div>

						<div class="title">
							<div class="slider">
								<ul class="rslides"><?php
								foreach($slideSEIS as $post) {
								 	echo get_template_part('inc/slide');
								} ?>
								</ul>
							</div>
						</div>
					</wrap>
				</div><?php
			}
		} // END 6 Horas
	} // END Has date

	wp_reset_query(); ?>
