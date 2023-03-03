<?php
	
	// 
	// Portfolio Preview
	// 

	add_action('acf/init', 'portfolio_preview_init');
	function portfolio_preview_init() {
		
		// check function exists
		if( function_exists('acf_register_block') ) {

			$default_block_settings = array(
				'name'				=> 'portfolio-preview',
				'title'				=> __('Portfolio Preview'),
				'description'		=> __('Adds a 6 pack preview of your portfolio'),
				'category'			=> 'formatting',
				'icon'				=> 'admin-page',
				'keywords'			=> array( 'portfolio', 'preview' ),
			);

			if ( !is_admin() ) {
				$default_block_settings['render_callback'] = 'portfolio_preview_render_callback';
			} else {
				$default_block_settings['render_callback'] = 'portfolio_preview_admin_render_callback';
			}
						
			// register a testimonial block
			acf_register_block($default_block_settings);
		}
	}

	function portfolio_preview_render_callback( $block ) {
		
		// convert name ("acf/testimonial") into path friendly slug ("testimonial")
		$slug = str_replace('acf/', '', $block['name']);
		
		// include a template part from within the "template-parts/block" folder
		if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
			include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
		}
	}

	function portfolio_preview_admin_render_callback( $block ) {
		
		// convert name ("acf/testimonial") into path friendly slug ("testimonial")
		$slug = str_replace('acf/', '', $block['name']);
		
		// include a template part from within the "template-parts/block" folder
		if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}-admin.php") ) ) {
			include( get_theme_file_path("/template-parts/block/content-{$slug}-admin.php") );
		}
	}

?>