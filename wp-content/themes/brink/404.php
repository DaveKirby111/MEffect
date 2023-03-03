<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Kinetic
 */

get_header(); ?>

	<?php get_template_part( 'template-parts/content', 'header-subpage' ); ?>

	<div class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php 
						echo apply_filters( 'the_content', get_field('404_content', 'option') );
						if ( get_field('404_include_search_form', 'option') ) get_search_form();
						if ( get_field('404_include_recent_posts', 'option') ):
							$post_type = get_post_type_object( get_field('404_recent_posts_type', 'option') );
							$posts = get_posts( array(
								'post_type' => $post_type->name,
								'numberposts' => 10,
								'orderby' => 'modified'
							));

							if ( count( $posts ) ):
								echo '<h2 class="big" style="margin-top: 20px;">Recent '. $post_type->label .'</h2>';
								$recent_posts = '';
								foreach( $posts as $p ):
									$recent_posts .= '<li><a href="'. get_the_permalink( $p ) .'">'. get_the_title( $p ) .'</a></li>';
								endforeach;
								echo '<ul class="recent-posts">'. $recent_posts .'</ul>';
							endif;

						endif;
					?>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
