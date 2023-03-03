<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Kinetic_Brink
 */

get_header(); 
get_template_part( 'template-parts/content', 'header-subpage' );
$blog_style = get_field( 'blog_layout', 'option' );
$has_sidebar = get_field('show_blog_sidebar', 'option');
?>
   
<div class="page-content">
	<div class="container">
		<div class="d-flex justify-content-between flex-wrap flex-lg-nowrap align-items-start">
			<div class="flex-grow-1 <?php echo $blog_style; ?>-layout <?php echo ( $has_sidebar ? 'has-sidebar' : '' ); ?>">
            <?php
                if ( have_posts() ): while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/archive-layout', $blog_style );
                endwhile;
                    the_posts_navigation();
                    wp_reset_postdata();
                else: 
                    get_template_part( 'template-parts/content', 'none' );
                endif;
                
                
            ?>
            </div>
            <?php if ( $has_sidebar ): ?>
                <div class="primary-sidebar">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
		</div>
	</div>
</div>

<?php

get_footer();
