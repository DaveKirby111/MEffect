<div class="news <?php echo $block['className']; ?>">
    <h3 class="t-darker-gray caps"><?php the_field('block_title'); ?></h3>
    <div class="news-wrap group row">
        
        <?php 
            $args = array(
                'post_type' => get_field('block_post_type'),
                'posts_per_page' => 3,
                'numberposts' => 3,
                'order' => 'DESC'
            );

            $news_posts = new WP_Query($args);

            if ($news_posts->have_posts()): while($news_posts->have_posts()) : $news_posts->the_post();
                
                // $img = wp_get_attachment_url( get_post_thumbnail_id());
                $img_alt = wp_get_attachment_image( get_post_thumbnail_id(), 'full' );
                $content_orig = get_the_content();
                $content = wp_trim_words( $content_orig, $num_words = 25, $more = '...' );
                $news_item = '<div class="col-12 col-lg-4"><div class="news-item">'.
                             '<a href="'. get_the_permalink() .'" class="news-img">'. $img_alt .'</a>'.
                             '<div class="news-info">'.
                             '<div class="news-header">'.
                             '<h4><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></h4>'.
                             '<span class="tiny"><i class="far fa-clock"></i> <em>Posted on '. get_the_date() .'</em></span>'.
                             '</div>'.
                             '<div class="news-content"><p>'. $content .'</p>'.
                             '<a href="'. get_the_permalink() .'" class="read-more caps heavy">Read More<i class="fas fa-chevron-right ml-3"></i></a>'.
                             '</div>'.
                             '</div>'.
                             '</div>'.
                             '</div>';

                echo $news_item;
            endwhile; endif; wp_reset_postdata();
        ?>
    </div>
    <div class="clear"></div>
    <?php if ( get_field('block_button_link') && get_field('block_button_label')) echo '<p class="t-center"><a href="'. get_field('block_button_link') .'" title="'. get_field('block_button_label') .'" class="button primary t-caps">'. get_field('block_button_label') .'</a></p>'; ?>
</div>
