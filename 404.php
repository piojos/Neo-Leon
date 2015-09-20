<?php get_header(); ?>
<div class="heading">
	<wrap>
		<img src="<?php bloginfo('template_url'); ?>/img/mascots.png" alt="" />
		<h1>404.Page Not Found</h1>
		<p>La página que buscas no ha sido encontrada, revisa el URL o visita nuestro <a href="<?php echo esc_url( home_url('/') ); ?>">homepage</a>.</p>
	</wrap>
</div>
<?php get_footer(); ?>
