<?php
    
    // 
    // Portfolio Preview
    // 

    add_action('acf/init', 'three_blog_posts_init');
    function three_blog_posts_init() {
        
        // check function exists
        if( function_exists('acf_register_block') ) {

            $default_block_settings = array(
                'name'              => 'three-blog-posts',
                'title'             => __('Three Blog Posts'),
                'description'       => __('Adds a 3 pack blog post previews.'),
                'category'          => 'formatting',
                'icon'              => 'format-aside',
                'keywords'          => array( 'blog', 'preview' ),
            );

            if ( !is_admin() ) {
                $default_block_settings['render_callback'] = 'three_blog_posts_render_callback';
            } else {
                $default_block_settings['render_callback'] = 'three_blog_posts_admin_render_callback';
            }
                        
            // register a testimonial block
            acf_register_block($default_block_settings);
        }
    }

    function three_blog_posts_render_callback( $block ) {
        
        // convert name ("acf/testimonial") into path friendly slug ("testimonial")
        $slug = str_replace('acf/', '', $block['name']);
        
        // include a template part from within the "template-parts/block" folder
        if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
            include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
        }
    }

    function three_blog_posts_admin_render_callback( $block ) {
        
        // convert name ("acf/testimonial") into path friendly slug ("testimonial")
        $slug = str_replace('acf/', '', $block['name']);
        
        // include a template part from within the "template-parts/block" folder
        if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}-admin.php") ) ) {
            include( get_theme_file_path("/template-parts/block/content-{$slug}-admin.php") );
        }
    }

?>