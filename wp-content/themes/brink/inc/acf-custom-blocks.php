<?php
	// 
	// Master list of enabled custom blocks
	// 

	// Hero Rotator
	require get_template_directory() . '/inc/blocks/block-hero-rotator.php';
	require get_template_directory() . '/inc/blocks/block-large-icon.php';
	require get_template_directory() . '/inc/blocks/block-portfolio-preview.php';
	require get_template_directory() . '/inc/blocks/block-three-blog-posts.php';
	require get_template_directory() . '/inc/blocks/block-call-to-action.php';
	require get_template_directory() . '/inc/blocks/block-centered-content.php';
	require get_template_directory() . '/inc/blocks/block-post-type-archive.php';

	// Searches for custom full-width blocks and lets them escape the container div
	function remove_wrapper($content) {

		// var_dump($content);

	    // Find Start Tags
		$start_tag = '~<!--kinetic-block:start-container-break-->~';
	    $content = preg_replace_callback($start_tag, function($matches) {
	        return '</div></div></div>';
	    }, $content);

	    // Find End Tags
		$end_tag = '~<!--kinetic-block:end-container-break-->~';
	    $content = preg_replace_callback($end_tag, function($matches) {
	        return '<div class="container pixel-fix"><div class="row"><div class="col-12">';
	    }, $content);

	    return $content;

	}
	add_filter('the_content', 'remove_wrapper');

?>