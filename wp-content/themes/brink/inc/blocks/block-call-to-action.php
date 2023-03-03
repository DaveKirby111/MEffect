<?php
	
	// 
	// Call to Action
	// 

	add_action('acf/init', 'call_to_action_init');
	function call_to_action_init() {
		
		// check function exists
		if( function_exists('acf_register_block') ) {

			$default_block_settings = array(
				'name'				=> 'call-to-action',
				'title'				=> __('Call to Action'),
				'description'		=> __('Adds a call to action to the page.'),
				'category'			=> 'formatting',
				'icon'				=> 'megaphone',
				'keywords'			=> array( 'icon' ),
				'mode'				=> 'edit',
			);

			$default_block_settings['render_callback'] = 'call_to_action_render_callback';
						
			// register a testimonial block
			acf_register_block($default_block_settings);
		}
	}

	function call_to_action_render_callback( $block ) {
		
		// convert name ("acf/testimonial") into path friendly slug ("testimonial")
		$slug = str_replace('acf/', '', $block['name']);
		
		// include a template part from within the "template-parts/block" folder
		if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
			include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
		}
	}

?>