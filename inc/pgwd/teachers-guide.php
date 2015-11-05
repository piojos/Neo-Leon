<div class="guide">
	<wrap><?php
		the_sub_field('description');
		$file = get_sub_field('file');
		if( $file ): ?>
			<a href="<?php echo $file['url']; ?>" class="button" target="_blank"><?php echo $file['title']; ?></a>
		<?php endif; ?>
	</wrap>
</div>
