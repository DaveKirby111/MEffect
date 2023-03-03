<?php
    $has_sidebar = ( is_page_template('page-with-sidebar.php') ? 'has-sidebar' : '' );
    $archive_post_type = get_field('archive_post_type' );
    $archive_style = get_field( 'archive_layout' );
    $post_count = get_field('archive_posts_count') ?: -1;
    $order = get_field('archive_posts_order') ?: 'DESC';
    $orderby = get_field('archive_posts_order_by') ?: 'date';
    $args = array( 
        'post_type' => $archive_post_type,
        'numberposts' => $post_count,
        'posts_per_page' => $post_count,
        'orderby' => $orderby,
        'order' => $order
    );?>
    <div class="col-12 px-0 <?php echo $archive_style; ?>-layout <?php echo $has_sidebar; echo ' ' . $block['className']; ?>">
    <?php
        $post_type = new WP_Query($args);
        
        if ( $post_type->have_posts() ) : while ( $post_type->have_posts() ) : $post_type->the_post();
            get_template_part( 'template-parts/archive-layout', $archive_style );
        endwhile;
        endif;
    ?>
    </div>
