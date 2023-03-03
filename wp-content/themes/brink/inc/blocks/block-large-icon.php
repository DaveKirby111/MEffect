<?php
	
	// 
	// Large Icon
	// 

	add_action('acf/init', 'large_icon_init');
	function large_icon_init() {
		
		// check function exists
		if( function_exists('acf_register_block') ) {

			$default_block_settings = array(
				'name'				=> 'large-icon',
				'title'				=> __('Large Icon'),
				'description'		=> __('Adds a large icon to your site.'),
				'category'			=> 'formatting',
				'icon'				=> 'visibility',
				'keywords'			=> array( 'icon' ),
				'mode'				=> 'edit',
			);

			$default_block_settings['render_callback'] = 'large_icon_render_callback';
						
			// register a testimonial block
			acf_register_block($default_block_settings);
		}
	}

	function large_icon_render_callback( $block ) {
		
		// convert name ("acf/testimonial") into path friendly slug ("testimonial")
		$slug = str_replace('acf/', '', $block['name']);
		
		// include a template part from within the "template-parts/block" folder
		if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
			include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
		}
	}

?>