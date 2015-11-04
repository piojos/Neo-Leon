	<div class="heading">
		<div>
			<?php
			if(is_post_type_archive('noticias')) {
				echo '<p>Todas las </p>';
			} elseif(is_post_type_archive('eventos'))  {
				echo '<p>Todos los </p>';
			} ?>
			<h1><?php
				$obj = get_post_type_object(get_post_type());

				if(is_archive()) {
					echo $obj->labels->name;
				} else {
					the_title();
				} ?>
			</h1><?php


			if(is_page()) {
				if(get_field('kicker')) {
					echo '<p>'. get_field('kicker') .'</p>';
				}
			} ?>


		</div>
	</div>
