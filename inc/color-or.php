<?php 
$sC = get_field('bg-color');
$sCAlfa = hex2rgba($sC, 0.5); 
if($sC){ ?>

<style>
	.rooms article .explanation h2 { color: <?php echo $sC; ?>; }

	.rooms article .slider .caption,
	.rooms article .slider a.rslides_nav,
	.rooms article .slider a.rslides_nav:hover {background-color: <?php echo $sC; ?>}

	.rooms article .quote wrap div:nth-child(2) {
		background-color: <?php echo $sCAlfa; ?>; 
	    height: 30em;
	    color: #FFF;
	}

	.expo .slider .caption .counter,
	.rooms article .quote h2 { color: #FFF; }
</style>
	
<?php 
} ?>