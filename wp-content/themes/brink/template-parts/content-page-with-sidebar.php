<?php
/**
 * Template part for displaying page content with sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kinetic
 */

?>

<div class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<?php the_content(); ?>
			</div>
			<div class="col-12 col-lg-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
