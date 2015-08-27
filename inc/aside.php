<aside>
	<wrap>
		<div class="headline">
			<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">3 Museos</a></div>
			<a href="#" class="close"><img src="<?php bloginfo('template_url');?>/img/close.svg"></a>
		</div>

<?php 
		if( have_rows('h_menu', 'option') ) : 
			echo '<ul class="aside_menu">';
			while( have_rows('h_menu', 'option') ): the_row(); ?>

				<li>
					<a href="<?php if( in_array( 'Enlace Externo', get_sub_field('opts')) ){ echo 'http://'.get_sub_field('out_link'); } else { the_sub_field('in_link'); } ?>">
						<?php the_sub_field('name'); ?>
					</a>

<?php 			$opts = get_sub_field('opts');
				if( in_array('Submenu', $opts) ): 
					echo '<ul>';
					while( have_rows('submenu') ): the_row(); ?>
					<li>
						<a href="<?php if( in_array( 'Enlace Externo', get_sub_field('sub_opts')) ){ echo 'http://'.get_sub_field('sub_out_link'); } else { the_sub_field('sub_in_link'); } ?>">
							<?php the_sub_field('sub_name'); ?>
						</a>
					</li>
<?php 				endwhile; 
					echo '</ul>';	
				endif;
				echo '</li>';	
			endwhile; 
			echo '</ul>';
		endif;  ?>

	</wrap>
</aside>

<script type="text/javascript">
	$( "a.site-map-button, .headline a.close" ).click(function() {
		$( "aside, header" ).toggleClass( "show" );          
	});
</script>








