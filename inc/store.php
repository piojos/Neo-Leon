<div class="store-rent"><?php
	while(have_rows('product')) : the_row(); ?>
	<div class="store"><?php
		if(get_sub_field('img')) { ?>
			<img src="<?php the_sub_field('img'); ?>" alt="<?php the_sub_field('title'); ?>" class="piece"><?php
		} ?>
		<div>
			<span><?php the_sub_field('pre-title'); ?></span>
			<h2><?php the_sub_field('title'); ?></h2>
			<h1><?php the_sub_field('kicker'); ?></h1>
			<a href="<?php the_sub_field('link'); ?>" class="button"><?php the_sub_field('btn'); ?></a>
		</div>
	</div><?php
	endwhile; ?><?php


	while(have_rows('pase_anual')) : the_row(); ?>
	<div class="store amigo"><?php
		if(get_sub_field('img')) { ?>
			<img src="<?php the_sub_field('img'); ?>" alt="<?php the_sub_field('title'); ?>" class="piece"><?php
		} ?>
		<div>
			<span><?php the_sub_field('pre-title'); ?></span>
			<h2><?php the_sub_field('title'); ?></h2>
			<h1><?php the_sub_field('kicker'); ?></h1>
			<a href="<?php the_sub_field('link'); ?>" class="button"><?php the_sub_field('btn'); ?></a>
		</div>
	</div><?php
	endwhile;


	while(have_rows('rsvp')) : the_row(); ?>
	<div class="rent">
		<div>
			<h2><?php the_sub_field('title'); ?></h2>
			<h1><?php the_sub_field('kicker'); ?></h1>
			<a href="<?php the_sub_field('link'); ?>" class="button"><?php the_sub_field('btn'); ?></a>
		</div><?php
		if(get_sub_field('img')) { ?>
			<img src="<?php the_sub_field('img'); ?>" alt="" class="decor"><?php
		} ?>
	</div><?php
	endwhile; ?>
</div>
