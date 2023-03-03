<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Kinetic_Brink
 */

get_header(); 
get_template_part( 'template-parts/sub', 'hero-solid');
?>
<div class="section">
        <div class="global-width">
		<?php
		if ( have_posts() ) : ?>
			<div class="content main-content"> 
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				// get_template_part( 'template-parts/content', get_post_format() );

            	 $img_alt = wp_get_attachment_image( get_post_thumbnail_id(), 'full' );
                        $content_orig = get_the_content();
                        $content = wp_trim_words( $content_orig, $num_words = 25, $more = '...' );
                        $news_item = '<div class="news-item news-item-2 group">'.
                                     '<a href="'. get_the_permalink() .'" class="news-img">'. $img_alt .'</a>'.
                                     '<div class="news-info">'.
                                     '<div class="news-header">'.
                                     '<h4><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></h4>'.
                                     '<span class="tiny"><i class="fa fa-clock-o" aria-hidden="true"></i> <em>Posted on '. get_the_date() .'</em></span>'.
                                     '</div>'.
                                     '<div class="news-content"><p>'. $content .'</p>'.
                                     '<a href="'. get_the_permalink() .'" class="read-more caps heavy">Read More</a>'.
                                     '</div>'.
                                     '</div>'.
                                     '</div>';

                        echo $news_item;

            ?>
            <?php
			endwhile;
			the_posts_navigation();

			?>
			</div>
			<?php get_sidebar();?>
			<?php

		else :
		?>
			<div class="content">
		<?php get_template_part( 'template-parts/content', 'none' ); ?>

					</div>

		<?php endif; ?>

			</div>
</div>
<?php
get_footer();
