<div class="heading">
	<div>
		<h3>Estas viendo la Colección: </h3>
		<ul class="dropdown">
			<li>
				<h1>
					<a href="#"><?php 
						if( is_tax() ) {
							global $wp_query;
							$term = $wp_query->get_queried_object();
							$title = $term->name;
							$slug = $term->slug;
							$description = $term->description;
							echo $title;
						} else {
							$cTerm = get_the_terms($post->ID, 'coleccion');	
							echo $cTerm[0]->name;
						} ?>
					</a>
				</h1>

				<ul>
				    <?php $hiterms = get_terms('coleccion', array("orderby" => "slug", "parent" => 0)); ?>
				    <?php foreach($hiterms as $key => $hiterm) : ?>
				        <li>
				            <a href=" <?php echo get_term_link( $hiterm ); ?>" title="<?php echo $hiterm->name; ?>"><?php echo $hiterm->name; ?></a>
				            <?php $loterms = get_terms('coleccion', array("orderby" => "slug", "parent" => $hiterm->term_id)); ?>
				            <?php if($loterms) : ?>
				                <ul class="sub">
				                    <?php foreach($loterms as $key => $loterm) : ?>
				                        <li><a href=" <?php echo get_term_link( $loterm ); ?>" title="<?php echo $loterm->name; ?>"><?php echo $loterm->name; ?></a></li>
				                    <?php endforeach; ?>
				                </ul>
				            <?php endif; ?>
				        </li>
				    <?php endforeach; ?>
				</ul>


			</li>
		</ul>
		<div class="about"><p><?php 
			echo $description; ?>
		</p></div>
	
	</div>	
</div>



		