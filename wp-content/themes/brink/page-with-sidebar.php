<?php
/**
 * Template Name: Page with Sidebar
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kinetic
 */

get_header(); ?>

	<?php get_template_part( 'template-parts/content', 'header-subpage' ); ?>

	<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page-with-sidebar' );

		endwhile; // End of the loop.
	?>

<?php
get_footer();
