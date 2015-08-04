	<div class="heading">
		<div>
			<?php if(get_post_type(get_the_ID()) == "eventos"){ 
				echo '<p>';
				echo get_template_part('funct/tag');
				echo '</p>'; 
			} ?>
			<h1><?php 

				$obj = get_post_type_object(get_post_type());

				if(is_archive()) {
					echo $obj->labels->name;
				} else {
					the_title();
				} ?></h1>
			<?php 	if(get_field('kicker')) { echo '<p>'. get_field('kicker') .'</p>'; } ?>
		</div>
	</div>
