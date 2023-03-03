<?php
	
	// 
	// Hero Rotator
	// 

	add_action('acf/init', 'my_acf_init');
	function my_acf_init() {
		
		// check function exists
		if( function_exists('acf_register_block') ) {

			$default_block_settings = array(
				'name'				=> 'hero-rotator',
				'title'				=> __('Hero Rotator'),
				'description'		=> __('Adds a hero rotator to your site.'),
				'category'			=> 'formatting',
				'icon'				=> 'images-alt2',
				'keywords'			=> array( 'hero', 'rotator' ),
				'mode'				=> 'edit',
			);

			if ( !is_admin() ) {
				$default_block_settings['render_callback'] = 'hero_rotator_render_callback';
			}
			
			// register a testimonial block
			acf_register_block($default_block_settings);
		}
	}

	function hero_rotator_render_callback( $block ) {
		
		// convert name ("acf/testimonial") into path friendly slug ("testimonial")
		$slug = str_replace('acf/', '', $block['name']);
		
		// include a template part from within the "template-parts/block" folder
		if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
			include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
		}
	}

?>