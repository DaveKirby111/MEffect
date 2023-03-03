<?php 
    $img_alt = wp_get_attachment_image( get_post_thumbnail_id(), 'full' );
?>
<div class="portfolio-item has-object-fit">
    <a href="<?php the_permalink(); ?>"><div class="portfolio-item-info t-white">
        <h4 class="caps"><?php the_title(); ?></h4>
        <p><?php $content_orig = get_the_content();
                    $content = wp_trim_words( $content_orig, $num_words = 8, $more = '...' );
                    echo $content; ?>
        </p>
        <p>Click to View</p>
    </div></a>
    <?php if ( $img_alt ) echo '<figure class="object-fit-image-container">'. $img_alt .'</figure>'; ?>
</div>
