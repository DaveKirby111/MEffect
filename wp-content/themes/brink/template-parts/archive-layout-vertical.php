<?php
    $img_alt = wp_get_attachment_image( get_post_thumbnail_id(), 'full' );
    $content_orig = get_the_content();
    $content = wp_trim_words( $content_orig, $num_words = 25, $more = '...' );
    $news_item = '<div class="news-item col-12 col-lg-4">'.
                    ( $img_alt ? '<a href="'. get_the_permalink() .'" class="news-img has-object-fit"><figure class="object-fit-image-container">'. $img_alt .'</figure></a>' : '' ) .
                    '<div class="news-info">'.
                    '<div class="news-header">'.
                    '<h4><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></h4>'.
                    '<span class="tiny"><i class="far fa-clock"></i> <em>Posted on '. get_the_date() .'</em></span>'.
                    '</div>'.
                    '<div class="news-content"><p>'. $content .'</p>'.
                    '<a href="'. get_the_permalink() .'" class="read-more caps heavy">Read More<i class="fas fa-chevron-right ml-3"></i></a>'.
                    '</div>'.
                    '</div>'.
                    '</div>';

    echo $news_item;
?>