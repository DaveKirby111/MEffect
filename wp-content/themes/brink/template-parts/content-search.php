<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kinetic_Brink
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title" style="margin: 35px 0 0;"><a href="%s" rel="bookmark" class="t-primary-color">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</div>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" class="read-more t-tertiary-color heavy">Read More</a>
	</div>
	
</article><!-- #post-## -->
