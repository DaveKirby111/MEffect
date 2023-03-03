<!--kinetic-block:start-container-break-->
<?php
	
	$color_scheme = get_field('color_scheme');

	$wrapper_classes = '';
	$content_classes = '';
	$button_classes = '';

	switch ( $color_scheme ) {
		case 'dark-grey':
				$wrapper_classes .= 'bg-dark-gray';
				$content_classes .= 't-white';
				$button_classes .= 'light';
			break;
		case 'primary-color':
				$wrapper_classes .= 'bg-primary-color';
				$content_classes .= 't-white';
				$button_classes .= 'primary-alt';
			break;
		case 'secondary-color':
				$wrapper_classes .= 'bg-secondary-color';
				$content_classes .= 't-white';
				$button_classes .= 'secondary-alt';
			break;
		default:
				$wrapper_classes .= 'bg-lighter-gray';
				$content_classes .= '';
				$button_classes .= 'primary';
			break;
	}

?>
<div class="call-to-action <?php echo $wrapper_classes; echo ' ' . $block['className']; ?>">
    <div class="container">
    	<div class="row">
	        <div class="col-12 col-lg-8 content-column <?php echo $content_classes; ?>">
	            <?php the_field('content'); ?>
	        </div>
	        <div class="col-12 col-lg-4 button-column">
	            <a href="<?php the_field('button_url'); ?>" class="button <?php echo $button_classes; ?>"><?php the_field('button_label'); ?></a>
	        </div>   		
    	</div>
    </div>
</div>
<!--kinetic-block:end-container-break-->
