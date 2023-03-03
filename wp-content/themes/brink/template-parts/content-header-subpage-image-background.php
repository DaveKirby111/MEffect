<?php
	
	$image_url = get_the_post_thumbnail_url(get_the_id(), 'hero-rotator-image');

?>
<div class="page-header with-hero" style="background-image: url(<?php echo $image_url; ?>);">
	<div class="container">
		<div class="row">
			<div class="col-12 title-container">
				<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
			</div>
		</div>
	</div>
</div>