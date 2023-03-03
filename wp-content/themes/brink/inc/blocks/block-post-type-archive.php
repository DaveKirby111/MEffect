<?php
    
    // 
    // Post Type Archive
    // 

    add_action('acf/init', 'post_type_archive_init');
    function post_type_archive_init() {
        
        // check function exists
        if( function_exists('acf_register_block') ) {

            $default_block_settings = array(
                'name'              => 'post-type-archive',
                'title'             => __('Post Type Archive'),
                'description'       => __('Display any public archive'),
                'category'          => 'formatting',
                'icon'              => 'archive',
                'keywords'          => array( 'blog', 'preview', 'archive' ),
            );

            if ( !is_admin() ) {
                $default_block_settings['render_callback'] = 'post_type_archive_render_callback';
            } else {
                $default_block_settings['render_callback'] = 'post_type_archive_admin_render_callback';
            }
                        
            // register a testimonial block
            acf_register_block($default_block_settings);
        }
    }

    function post_type_archive_render_callback( $block ) {
        
        // convert name ("acf/testimonial") into path friendly slug ("testimonial")
        $slug = str_replace('acf/', '', $block['name']);
        
        // include a template part from within the "template-parts/block" folder
        if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
            include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
        }
    }

    function post_type_archive_admin_render_callback( $block ) {
        
        // convert name ("acf/testimonial") into path friendly slug ("testimonial")
        $slug = str_replace('acf/', '', $block['name']);
        
        // include a template part from within the "template-parts/block" folder
        if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}-admin.php") ) ) {
            include( get_theme_file_path("/template-parts/block/content-{$slug}-admin.php") );
        }
    }

?>