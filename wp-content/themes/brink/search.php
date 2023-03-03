<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package Kinetic_Brink
 */

get_header(); 
get_template_part( 'template-parts/sub', 'hero-default' );
?>
<div class="section">
    <div class="container">
    	<div class="row">
    		<div class="col-12">
				<?php
				if ( have_posts() ) : ?>
					<div class="content main-content"> 
						<h3 class="t-text-color"><?php printf( esc_html__( 'Search Results for: %s', 'kinetic-brink' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

		            	 get_template_part( 'template-parts/content', 'search' );

		            ?>
		            <?php
					endwhile;
					the_posts_navigation();

					?>
					</div>
					<?php

				else :
				?>
					<div class="content">
				<?php get_template_part( 'template-parts/content', 'none' ); ?>

							</div>

				<?php endif; ?>
    		</div>
    	</div>
	</div>
</div>
<?php
get_footer();