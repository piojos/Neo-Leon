<?php

	$ftd_img = get_field( 'search_bg', 'options' );
	$img_med = wp_get_attachment_image_src($ftd_img, 'medium');
	$img_large = wp_get_attachment_image_src($ftd_img, 'large');
	$img_larger = wp_get_attachment_image_src($ftd_img, 'larger');
	$img_largest = wp_get_attachment_image_src($ftd_img, 'largest');
	$img_huge = wp_get_attachment_image_src($ftd_img, 'huge'); ?>


<div class="search_box">
<?php 	echo '<style>
		.search_box {background-image: url(' . $img_med[0] . ');}';
		if($img_large) { echo ' @media (min-width: 600px) { .search_box {background-image: url(' . $img_large[0] . ');} }'; }
		if($img_larger) { echo ' @media (min-width: 1024px) { .search_box {background-image: url(' . $img_larger[0] . ');} }'; }
		if($img_largest) { echo ' @media (min-width: 1400px) { .search_box {background-image: url(' . $img_largest[0] . ');} }'; }
		if($img_huge) { echo ' @media (min-width: 1800px) { .search_box {background-image: url(' . $img_huge[0] . ');} }'; }
		echo '</style>';  ?>
	<div class="mask"></div>
	<div class="content">
	<?php if(get_post_type() == 'eventos') : ?>
		<h2>En 3 Museos hay muchos eventos para tí</h2>

		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url($path='eventos'));?>">
			<label>Estas viendo <span class="on">me interesa</span></label>
			<?php
			$terms = get_terms('event-type');
			$count = count($terms);
			if ( $count > 0 ){
				echo '<select name="evType" id="evType"><option value="">Todos los tipos de eventos</option>';
				foreach ( $terms as $term ) {
					echo '<option value="'.$term->slug.'" '; 
						if ($term->slug == $_GET["evType"]){
							echo 'selected';	
						}
					echo '>'.$term->name.'</option>';
				}
				echo '</select>';
			} ?>
			<label><span>presentados </span> en</label>
			<select name="museum" id="museum">
				<option value="1">los 3 Museos</option>
				<option value="Museo de Historia Mexicana"<?php if ('Museo de Historia Mexicana' == $_GET['museum']){ echo 'selected'; } ?>>Museo de Historia Mexicana</option>
				<option value="Museo del Noreste"<?php if ('Museo del Noreste' == $_GET['museum']){ echo 'selected'; } ?>>Museo del Noreste</option>
				<option value="Museo del Palacio"<?php if ('Museo del Palacio' == $_GET['museum']){ echo 'selected'; } ?>>Museo del Palacio</option>
			</select><br>
			<label><span>el día </span></label>
			<input type="text" id="date" name="date" value="<?php 
				if(htmlentities($_GET['date']) == "") { 
					echo date('d M Y');
				} else {
					echo $_GET['date'];
				} ?>">
			<input type="hidden" id="dateFormat" name="dateFormat" value="<?php echo $_GET['dateFormat'] ?>">
			<br>
			<input type="submit" id="searchsubmit" value="Actualiza los Resultados">
		</form>


	<?php elseif(is_page('planea-tu-visita')) : ?>
		<h2><?php the_title(); ?></h2>

		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url($path='planea-tu-visita')); ?>">
			<label>Soy</label>
			<select name="audience" id="museum">
				<option value="public">público general</option>
				<option value="tourist">un turista</option>
				<option value="student">un estudiante</option>
				<option value="academic">un académico</option>
			</select>
			<label><span>y </span> cuento con</label>
			<select name="time" id="museum">
				<option value="120">2 horas</option>
				<option value="240">4 horas</option>
				<option value="360">6 horas</option>
			</select><br>
			<label><span>el día</span></label>
			<input type="text" id="date" name="date" value="<?php 
				if(htmlentities($_GET['date']) == "") { 
					echo date('d M Y');
				} else {
					echo $_GET['date'];
				} ?>">
			<input type="hidden" id="dateFormat" name="dateFormat"  value="<?php echo $_GET['dateFormat'] ?>">
			<br>
			<input type="submit" id="searchsubmit" value="Planea mi Visita">
		</form>

	<?php else : ?>

		<h2>3 Museos tiene muchas cosas para tí</h2>

		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url($path='eventos')); ?>">
			<label>Me interesa </label>
			<?php
			$terms = get_terms('event-type');
			$count = count($terms);
			if ( $count > 0 ){
				echo '<select name="evType" id="evType"><option value="">Todos los tipos de eventos</option>';
				foreach ( $terms as $term ) {
					echo '<option value="'.$term->slug.'">'.$term->name.'</option>';
				}
				echo '</select>';
			} ?>
			<label><span>presentados </span> en</label>
			<select name="museum" id="museum">
				<option value="1">los 3 Museos</option>
				<option value="Museo de Historia Mexicana">Museo de Historia Mexicana</option>
				<option value="Museo del Noreste">Museo del Noreste</option>
				<option value="Museo del Palacio">Museo del Palacio</option>
			</select><br>
			<label><span>el día</span></label>
			<input type="text" id="date" name="date" value="<?php 
				if(htmlentities($_GET['date']) == "") { 
					echo date('d M Y');
				} else {
					echo $_GET['date'];
				} ?>">
			<br>
			<input type="submit" id="searchsubmit" value="Actualiza los Resultados">
		</form>


	<?php endif; ?>


	</div>
</div>
