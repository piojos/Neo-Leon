<?php

function my_posts_where( $where ) {
	$where = str_replace("meta_key = 'days_%_date", "meta_key LIKE 'days_%_date", $where);
	$where = str_replace("meta_key = 'dates_%_start-day", "meta_key LIKE 'dates_%_start-day", $where);
	$where = str_replace("meta_key = 'dates_%_end-day", "meta_key LIKE 'dates_%_end-day", $where);
	return $where;
}
add_filter('posts_where', 'my_posts_where');

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
			'value'		=> $date
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

	$slideDOS =array();
	$slideCUATRO =array();
	$slideSEIS =array();
	$museoH =array();
	$museoN =array();
	$museoP =array();

	$dur = 0;
	$exit =true;
	$isExpoAdded = false;
	$isExpoTemAdded = false;
	$duracion120=120;


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
/*	echo 'MUSEO H<br>';
	foreach($museoH as $H) {
		echo  $H->ID .' ID<br>';
		echo  $H->duracion .' Duracion<br>';
		echo  $H->description . ' Descritopn<br>';
		echo  $H->expo_status . ' Estatus<br>';

	}
	echo 'MUSEO N<br>';
	foreach($museoN as $N) {
		echo  $N->duracion .'N<br>';
		echo  $N->ID .'N<br>';
		echo  $N->post_type . 'N<br>';
		echo  $N->description . 'N<br>';
	}
	echo 'MUSEO P<br>';
	foreach($museoP as $P) {
		echo  $P->duracion .'P<br>';
		echo  $P->ID .'P<br>';
		echo  $P->post_type . 'P<br>';
		echo  $P->description . 'P<br>';
	}
*/


	if($_GET['dateFormat']!= ''){

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

							if($duracion120 - $post->duracion >= 0){
								array_push($slideDOS,$post);
								$duracion120 -= $post->duracion;
							}
						}
					}


					if (count($slideDOS)>0 ){
					?>
					<div class="events">
						<wrap>
							<div class="line">
								<div>
									<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
								</div>
								<div></div>
							</div>

							<div class="title">

					<?php
							echo '<div class="slider">';
							echo '<ul class="rslides">';

							foreach($slideDOS as $post) {
							    // Do your stuff, e.g.

								 	echo get_template_part('inc/slide','slide');

							}
							echo '</ul></div>';
							echo '</div>';
							echo '</wrap>';
							echo '</div>';
						}

					$duracion120 = 120;
					$isExpoAdded=false;
					$isExpoTemAdded=false;

		}elseif($time ==240){
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

					if($duracion120 - $post->duracion >= 0){
						array_push($slideDOS,$post);
						$duracion120 -= $post->duracion;
					}
				}
			}

			if (count($slideDOS)>0 ){
				?>

				<div class="events">
					<wrap>
						<div class="line">
							<div>
								<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
							</div>
							<div></div>
						</div>

						<div class="title">

				<?php
					echo '<div class="slider">';
					echo '<ul class="rslides">';

					foreach($slideDOS as $post) {
					    // Do your stuff, e.g.

						 	echo get_template_part('inc/slide','slide');

					}
					echo '</ul></div>';
					echo '</div>';
					echo '</wrap>';
					echo '</div>';
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

					if($duracion120 - $postN->duracion >= 0){
						array_push($slideCUATRO,$postN);
						$duracion120 -= $postN->duracion;
					}
				}
			}
			if (count($slideCUATRO)>0 ){
				?>
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
				<div class="events">
					<wrap>
						<div class="line">
							<div>
								<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
							</div>
							<div></div>
						</div>

						<div class="title">

				<?php
			   		 echo '<div class="slider">';
			   		 echo '<ul class="rslides">';

			   		foreach($slideCUATRO as $post) {
			   		    // Do your stuff, e.g.

			   			 	echo get_template_part('inc/slide','slide');

			   		}
		   			echo '</ul></div>';
					echo '</div>';
					echo '</wrap>';
					echo '</div>';
		   	}
			$duracion120 = 120;
			$isExpoAdded=false;
			$isExpoTemAdded=false;
		}elseif($time ==360){
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

					if($duracion120 - $post->duracion >= 0){
						array_push($slideDOS,$post);
						$duracion120 -= $post->duracion;
					}
				}
			}

			if (count($slideDOS)>0 ){
				?>

				<div class="events">
					<wrap>
						<div class="line">
							<div>
								<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
							</div>
							<div></div>
						</div>

						<div class="title">

				<?php
					echo '<div class="slider">';
					echo '<ul class="rslides">';

					foreach($slideDOS as $post) {
					    // Do your stuff, e.g.

						 	echo get_template_part('inc/slide','slide');

					}
					echo '</ul></div>';
					echo '</div>';
					echo '</wrap>';
					echo '</div>';
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

					if($duracion120 - $postN->duracion >= 0){
						array_push($slideCUATRO,$postN);
						$duracion120 -= $postN->duracion;
					}
				}
			}
			if (count($slideCUATRO)>0 ){
				?>
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
				<div class="events">
					<wrap>
						<div class="line">
							<div>
								<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
							</div>
							<div></div>
						</div>

						<div class="title">

				<?php
			   		 echo '<div class="slider">';
			   		 echo '<ul class="rslides">';

			   		foreach($slideCUATRO as $post) {
			   		    // Do your stuff, e.g.

			   			 	echo get_template_part('inc/slide','slide');

			   		}
		   			echo '</ul></div>';
					echo '</div>';
					echo '</wrap>';
					echo '</div>';
		   		}
				$duracion120 = 120;
				$isExpoAdded=false;
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

						if($duracion120 - $postP->duracion >= 0){
							array_push($slideSEIS,$postP);
							$duracion120 -= $postP->duracion;
						}
					}
				}
 				if(count($museoP)>0 ){
					?>
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
					<div class="events">
						<wrap>
							<div class="line">
								<div>
									<img src="<?php bloginfo('template_url'); ?>/img/frontdesk.svg">
								</div>
								<div></div>
							</div>

							<div class="title">

					<?php
					echo '<div class="slider">';
					echo '<ul class="rslides">';
					foreach($slideSEIS as $post) {
					    // Do your stuff, e.g.

						 	echo get_template_part('inc/slide','slide');

					}
					echo '</ul></div>';
					echo '</div>';
					echo '</wrap>';
					echo '</div>';
				}
			}
		}

	wp_reset_query();?>
