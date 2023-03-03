	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php 
						if ( is_home() ):
							echo '<h1 class="page-title">'. get_the_title( get_option('page_for_posts', true) ) .'</h1>';
						elseif ( is_404() ):
							echo '<h1 class="page-title">'. get_field('404_title', 'option') .'</h1>';
						else :
							the_title( '<h1 class="page-title">', '</h1>' ); 
						endif;
					?>
				</div>
			</div>
		</div>
	</div>