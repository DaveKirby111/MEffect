<?php
	
	// 
	// Centered Content
	// 

	add_action('acf/init', 'centered_content_init');
	function centered_content_init() {
		
		// check function exists
		if( function_exists('acf_register_block') ) {

			$default_block_settings = array(
				'name'				=> 'centered-content-block',
				'title'				=> __('Centered Content Block'),
				'description'		=> __('Adds a content area that is centered with a background.'),
				'category'			=> 'formatting',
				'icon'				=> 'editor-aligncenter',
				'keywords'			=> array( 'icon' ),
				'mode'				=> 'edit',
			);

			$default_block_settings['render_callback'] = 'centered_content_render_callback';
						
			// register a testimonial block
			acf_register_block($default_block_settings);
		}
	}

	function centered_content_render_callback( $block ) {
		
		// convert name ("acf/testimonial") into path friendly slug ("testimonial")
		$slug = str_replace('acf/', '', $block['name']);
		
		// include a template part from within the "template-parts/block" folder
		if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
			include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
		}
	}

?>