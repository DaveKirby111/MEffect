<!--kinetic-block:start-container-break-->
<?php 
	$block_background_color = get_field('background_color'); 
	$block_text_white = get_field('white_text');
?>
<div class="centered-content-block bg-lighter-gray <?php echo $block['className']; ?>" <?php echo ( $block_background_color ? 'style="background-color: '. $block_background_color .' !important;"' : '' ); ?> >
    <div class="container">
    	<div class="row">
	        <div class="col-12 col-lg-8 offset-lg-2 content-column t-center <?php echo ( $block_text_white ? 't-white' : '' ); ?>" >
	            <?php the_field('content'); ?>
	        </div>		
    	</div>
    </div>
</div>
<!--kinetic-block:end-container-break-->
