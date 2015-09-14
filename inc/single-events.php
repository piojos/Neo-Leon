<?php 
	
	// $bodyClass = "events single";
	// $newsletter = 1;
	
	?>

	<section>

<?php 	$image = get_post_thumbnail_id( $post_id );
		$dateformatstring = "l F j, Y";
		$unixtimestamp = strtotime(get_field('date'));
		
		if ($image) { echo '<div class="featured_img">'; }

			echo '<picture><!--[if IE 9]><video style="display: none;"><![endif]-->';
			$img_small = wp_get_attachment_image_src($image, 'thumbnail');
			$img_med = wp_get_attachment_image_src($image, 'medium');
			$img_large = wp_get_attachment_image_src($image, 'large');
			$img_larger = wp_get_attachment_image_src($image, 'larger');
			$img_largest = wp_get_attachment_image_src($image, 'largest');
			$img_huge = wp_get_attachment_image_src($image, 'huge');

			if($img_largest) { echo '<source srcset ="' . $img_huge[0] . '" media="(min-width: 1800px)">'; }
			if($img_larger) { echo '<source srcset ="' . $img_largest[0] . '" media="(min-width: 1400px)">'; }
			if($img_large) { echo '<source srcset ="' . $img_larger[0] . '" media="(min-width: 1024px)">'; }
			if($img_med) { echo '<source srcset ="' . $img_large[0] . '" media="(min-width: 600px)">'; }

			echo '<!--[if IE 9]></video><![endif]-->
				<img src="' . $img_med[0] . '" srcset ="' . $img_med[0] . '" title="" alt="">
			</picture>'; 

		if ($image) { 
			if( in_array( 'cancel', get_field('options') ) ) {
				echo '<div class="warn FU_B red"><img src="'. get_bloginfo("template_url") .'/img/ev-cancel.svg"> CANCELADO</div> ';
			} elseif( in_array( 'update', get_field('options') ) ) {
				echo '<div class="warn FU_B"><img src="'. get_bloginfo("template_url") .'/img/ev-change.svg"> ACTUALIZADO</div> ';
			} elseif( in_array( 'live', get_field('options') ) ) {
				echo '<div class="warn FU_B orange"><img src="'. get_bloginfo("template_url") .'/img/ev-live.svg"> TRANSMISIÓN EN VIVO</div> ';
			}
			echo '</div>'; 
		} ?>

<?php 	echo get_template_part('inc/heading'); ?>

		<div class="contain">
			<wrap>
				<div class="content">
					<h2>Acerca del Evento</h2>

					<?php the_content(); ?>

					<div class="share">
						<ul>
							<li>Comparte esto</li>
							<ul class="buttons">
								<li><a href="#"><img src="<?php bloginfo('template_url');?>/img/c-fb.svg"></a></li>
								<li><a href="#"><img src="<?php bloginfo('template_url');?>/img/c-tw.svg"></a></li>
							</ul>
						</ul>
						<a href="#" class="back">Regresar</a>
					</div>
				</div>
				<div class="details">
					<h2>Información General</h2>
					<p><?php echo get_template_part('funct/eventdate'); ?><br><br>
					<?php if(get_field('location')){ the_field('location'); } ?>
					<?php if(get_field('museum')){ echo '<br>'.get_field('museum'); } ?></p>

					<p>
					<?php if(get_field('price')){ 
							echo 'Entrada: $'.get_field('price').' MXN<br>'; 
						} else {
							echo 'Evento gratuito<br>';
						}?>
					<?php if(get_field('limited')){ 
						echo 'Cupo limitado'; 
						if(get_field('limited-num')){ 
							echo ' ('.get_field('limited-num').' pers.)';
						}
					} ?></p>
					<?php if(get_field('embed')){ echo '<a class="compra">Compra tu boleto</a>'; } ?>

					
					<?php 
						$email = get_field('email');
						$phone = get_field('phone');
						if ($email or $phone) {
							echo '<h2>Contacto</h2><p class="contact-info">';
							if($email) {echo '<a href="mailto:'.$email.'@3museos.com">'.$email.'@3museos.com</a><br>';}
							echo '<a href="tel:'.$phone.'">'.$phone.'</a></p>';
						}
					 ?>


				</div>
			</wrap>
		</div>

		<script>
			$(document).ready(function() {
			    var x = $('.contain .content').outerHeight();
			    $('.contain .details').css('height', x);
			});
			$(window).resize(function() {
			    var x = $('.contain .content').outerHeight();
			    $('.contain .details').css('height', x);
			});
		</script>

	</section>

	<?php echo get_template_part('inc/more_news'); ?>


