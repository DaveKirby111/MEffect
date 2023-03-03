<?php
/**
 * This template is used for the static homepage
 * 
 * Template Name: Home
 *
 * @package Kinetic
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
					while ( have_posts() ) : the_post();

						the_content();

					endwhile; // End of the loop.
				?>
			</div>
		</div>
	</div>
<?php
get_footer();
